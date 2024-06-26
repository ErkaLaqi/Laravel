<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserStoreRequest extends UserUpdateRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules['password'] = ['required', 'confirmed',  Password::defaults()];
        $rules['username'] = [Rule::unique(User::class)];
        $rules['email'] = [Rule::unique(User::class)];

        return $rules;
    }
}
