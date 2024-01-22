<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReturnsRequest extends FormRequest
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
            // 'question' => 'required|string|max:100',
            // 'returntable_id' => 'nullable|string|max:100',
            // 'returntable_type' => 'required|string|max:100',
            'date' => 'required|string|max:100',
            'reference' => 'required|string|max:100',
            'tax' => 'nullable|string|max:100',
            'discount' => 'nullable|string|max:100',
            'shipping' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            // 'question.required' => 'question Name is required.',
            'date.required' => 'date is required.',
            'reference.required' => 'reference is required.',
        ];
    }
}
