<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required|string|min:3',
            'lastName' => 'required|string|min:4',
            'email' => 'required|email|unique:users',
            'image' => 'image',
            'national_code' => 'required|integer|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ];
    }
}
