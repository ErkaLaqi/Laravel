<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Dotenv\Validator;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserStoreRequest;

use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{

//display a listing of the resource
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
        $currentUser = auth()->user();

        if ($currentUser->role === 'admin') {
            $users = User::latest()->get();
        } elseif ($currentUser->role === 'manager') {
            // Fetch users supervised by the manager
            $users = User::where('supervisor_id', $currentUser->id)->latest()->get();
        }

        if ($request->ajax()) {

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        return view('users.index', compact('users'));
    }

    public function store (UserStoreRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = new User();
        $user->fill($validatedData);
        $user->save();

        return response()->json(['success' => 'User created successfully.']);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $user->fill($validatedData);
        $user->save();

        return response()->json(['success' => 'User updated successfully.']);
    }

    public function edit($id)
    {
        return User::findOrFail($id);
    }
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['success'=>'User deleted successfully.']);
    }

}
