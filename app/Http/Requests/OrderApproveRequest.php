<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderApproveRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'country' => 'required',
            'area' => 'required',
            'city' => 'required',
            'street' => 'required',
            'name' => 'required',
            'phone' => 'required',


        ];
    }
}