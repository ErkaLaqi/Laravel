<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     *
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z]+$/u'],
            'lastname' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z]+$/u'],
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'birthday' => ['required', 'date', 'max:255', 'before:'.now()->subYears(18)->toDateString() ],
            'photo' => ['mimes:jpeg,png,webp,jpg','max:2048'],
        ];

    }



}
