<?php

namespace App\Http\Requests\Noutbook;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'type' => 'string',
            'name' => 'string',
            'shorts' => 'string',
            'brend' => 'string',
            'battery' => 'integer',
            'color' => 'string',
            'price' => 'decimal:2',
            'image1' => 'string',
            'image2' => 'string',
            'image3' => 'string',
            'processor' => 'string',
            'speed' => 'integer',
            'videocard' => 'string',
            'os' => 'string',
            'screen' => 'decimal:2',
            'screentype' => 'string',
            'resolution' => 'string',
            'ram' => 'integer',
            'ramtype' => 'string',
            'memory' => 'integer',
            'memotype' => 'string',
            'variant' => 'integer',
        ];
    }
}
