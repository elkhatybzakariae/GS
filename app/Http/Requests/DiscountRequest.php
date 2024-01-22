<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'discountName' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'value' => 'required|string|max:100',
            'restrictedAccess' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'discountName.required' => 'discount name is required.',
            'type.required' => 'type is required.',
            'value.required' => 'value is required.',
            'restrictedAccess.required' => 'restricted Access is required.',
        ];
    }
}
