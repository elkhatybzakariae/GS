<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'countryName' => 'required|string|max:100',
            'description' => 'nullable|string|max:100',
            'status' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'countryName.required' => 'country Name is required.',
            'description.required' => 'description is required.',
            'status.required' => 'status is required.',
        ];
    }
}
