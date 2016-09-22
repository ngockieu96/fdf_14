<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'category_id' => 'exists:categories,id',
            'image' => 'required|mimes:jpg,jpeg,png,gif,svg',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
        ];
    }
}
