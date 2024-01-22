<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'CatName' => 'required|string|max:100',
            'catPic' => 'nullable|string|max:100',
            'catCode' => 'required|string|max:100',
            'description' => 'nullable|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'CatName.required' => 'The category name is required.',
            'catCode.required' => 'The category code is required.',
        ];
    }
}
