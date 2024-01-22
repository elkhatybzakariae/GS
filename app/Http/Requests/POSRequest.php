<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class POSRequest extends FormRequest
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
            'subtotal' => 'required|string|max:100',
            'tax' => 'required|string|max:100',
            'total' => 'required|string|max:100',
            'paymenttype' => 'required|string|max:100',
            'id_Cus' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'subtotal.required' => 'subtotal is required.',
            'tax.required' => 'tax is required.',
            'total.required' => 'total is required.',
            'paymenttype.required' => 'payment type is required.',
            'id_Cus.required' => 'Customer is required.',
            
        ];
    }
}
