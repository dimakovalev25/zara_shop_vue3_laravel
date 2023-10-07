<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'country' => 'required',
            'zipcode' => 'required|max:6',
            'area' => 'required',
            'city' => 'required',
            'street' => 'required',
            'name' => 'required',
            'phone' => 'required',





        ];
    }
}