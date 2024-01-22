<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'firstName' => 'required|string|max:100',
            'lastName' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:100',
            'address1' => 'required|string|max:100',
            'address2' => 'nullable|string|max:100',
            'avatar' => 'nullable|string|max:100',
            'codePostal' => 'nullable|string|max:100',
            'note' => 'nullable|string|max:100',
            'id_City' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'firstName.required' => 'First Name is required.',
            'lastName.required' => 'Last is required.',
            'email.required' => 'Email is required.',
            'phone.required' => 'Email is required.',
            'address1.required' => 'Address 1 is required.',
            'id_City.required' => 'city is required.',
        ];
    }
}
