<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|min:4',
            'product_key' => 'required|unique:products',
            'price' => 'required|integer',
            'description' => 'string|required',
            'seller' => 'required',
            'number' => 'integer',
            'image' => 'image',
            'sex'=>'required',
            'existence'=>'required',
        ];
    }
}
