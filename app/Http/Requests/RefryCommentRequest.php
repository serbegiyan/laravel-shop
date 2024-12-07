<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefryCommentRequest extends FormRequest
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
            'title' => 'required|string',
            'body' => 'required|string',
            'rating' => 'integer|required',
            'user_id' => 'integer|required',
            'category_id' => 'integer|required',
            'commentable_id' => 'integer|required',
            'commentable_type' => 'string|required'
        ];
    }
}
