<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'user_id' => 'exists:users,id',
            'price' => 'required|numeric|min:0',
            'status' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required|max:12',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
        ];
    }
}
