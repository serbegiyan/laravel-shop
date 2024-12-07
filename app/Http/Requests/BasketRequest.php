<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketRequest extends FormRequest
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
            'user_number' => 'string|required',
            'product_name' => 'string|required',
            'color' => 'string|required',
            'product_type' => 'string|required',
            'product_id' => 'integer|required',
            'preview' => 'string|required',
            'price' => 'required|decimal:2',
            'quantity' => 'integer|required',
            'total_price' => 'required|decimal:2',
        ];
    }
}
