<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        if (Auth::id())
        {
            $role=Auth()->user()->role;

            if($role=='user')
            {
                return view('profile');
            }
            elseif ($role=='admin')
            {
                return view('users');
            }
            else
            {
                return redirect()->back();
            }
        }
    }
}
