<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brandPic' => 'required|string|max:100',
            'brandName' => 'required|string|max:100',
            'description' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'brandPic.required' => 'brand Pic name is required.',
            'brandName.required' => 'brand Name is required.',
            'description.required' => 'description is required.',
        ];
    }
