<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'reference' => 'required|string|max:100',
            'receivedAmount' => 'required|string|max:100',
            'payingAmount' => 'required|string|max:100',
            'paymentType' => 'required|string|max:100',
            'note' => 'nullable|string|max:100',
            'id_Sale' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => 'date is required.',
            'reference.required' => 'reference is required.',
            'receivedAmount.required' => 'received Amount is required.',
            'payingAmount.required' => 'paying Amount is required.',
            'paymentType.required' => 'payment Type is required.',
            'id_Sale.required' => 'Sale is required.',
            
        ];
    }
}
