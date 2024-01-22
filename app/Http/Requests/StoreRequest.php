<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'storeName' => 'required|string|max:100',
            'storeImage' => 'nullable|string|max:100',
            'status' => 'required|string|max:100',
            'id_City' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'storeName.required' => 'store Name is required.',
            'status.required' => 'status is required.',
            'id_City.required' => 'City is required.',
        ];
    }
}
