<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'date' => 'required|string|max:100',
            'tax' => 'nullable|string|max:100',
            'discount' => 'nullable|string|max:100',
            'shipping' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:100',
            'reference' => 'required|string|max:100',
            'total' => 'required|string|max:100',
            'id_Supplier' => 'required|string|max:100',
            'id_Cus' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => 'date is required.',
            'reference.required' => 'reference is required.',
            'total.required' => 'total is required.',
            'id_Supplier.required' => 'Supplier is required.',
            'id_Cus.required' => 'Customer is required.',
            
        ];
    }
}
