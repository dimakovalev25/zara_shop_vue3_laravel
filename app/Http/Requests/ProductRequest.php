<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'max:2000'],
            'image' => ['nullable', 'image'],
            'price' => ['required', 'numeric'],
            'description' => ['nullable', 'string']
        ];
    }
}