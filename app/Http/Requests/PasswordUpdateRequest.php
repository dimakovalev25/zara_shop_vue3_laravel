<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password' => 'current_password',
            'new_password' => ['required', 'confirmed', Password::min(6)->letters()->numbers()]
//            'new_password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()]

        ];
    }
}