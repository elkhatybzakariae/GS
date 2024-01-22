<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'supplierName' => 'required|string|max:100',
            'reference' => 'required|string|max:100',
            'date' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'PaymentStatus' => 'required|string|max:100',
            'due' => 'required|string|max:100',
            'paid' => 'required|string|max:100',
            'grandTotal' => 'required|string|max:100',
            'discount' => 'nullable|string|max:100',
            'tax' => 'nullable|string|max:100',
            'shipping' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:100',
            'purchaseOrderDate' => 'required|string|max:100',
            'expectedOn' => 'required|string|max:100',
            'id_Supplier' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'supplierName.required' => 'supplier Name is required.',
            'reference.required' => 'reference is required.',
            'date.required' => 'date is required.',
            'status.required' => 'status is required.',
            'PaymentStatus.required' => 'Payment Status is required.',
            'due.required' => 'due is required.',
            'paid.required' => 'paid is required.',
            'grandTotal.required' => 'grand Total is required.',
            'purchaseOrderDate.required' => 'purchase Order Date is required.',
            'expectedOn.required' => 'expected On is required.',
            'id_Supplier.required' => 'Supplier is required.',
        ];
    }
}
