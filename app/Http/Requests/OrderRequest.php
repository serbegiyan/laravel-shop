<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'all_purchases' => 'integer|required',
            'details_purchases' => 'string|required',
            'order_price' => 'required|string',
            'user_name'=> 'required|string',
            'user_surname'=> 'required|string',
            'user_email' => 'required|string',
            'user_phone' => 'required|string',
            'user_address' => 'required|string',
            'number' => 'string|required'
        ];
    }
}
