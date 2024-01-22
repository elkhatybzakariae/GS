<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'producName' => 'required|string|max:100',
            'SKU' => 'required|string|max:100',
            'minQty' => 'required|string|max:100',
            'Quantity' => 'required|string|max:100',
            'description' => 'nullable|string|max:100',
            'price' => 'required|string|max:100',
            'cost' => 'required|string|max:100',
            'tax' => 'required|string|max:100',
            'proPic' => 'required|string|max:100',
            'expiryDate' => 'required|string|max:100',
            'barcode' => 'required|string|max:100',
            'availableforsale' => 'required|string|max:100',
            'soldby' => 'required|string|max:100',
            'status' => 'required|string|max:100',
            'id_U' => 'required|string|max:100',
            'id_Discount' => 'required|string|max:100',
            'id_Unit' => 'required|string|max:100',
            'id_Cat' => 'required|string|max:100',
            'id_Brand' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'producName.required' => 'produc name is required.',
            'SKU.required' => 'SKU is required.',
            'minQty.required' => 'minQty is required.',
            'Quantity.required' => 'Quantity is required.',
            'price.required' => 'price is required.',
            'cost.required' => 'cost is required.',
            'tax.required' => 'tax is required.',
            'proPic.required' => 'proPic is required.',
            'expiryDate.required' => 'expiry Date is required.',
            'barcode.required' => 'barcode is required.',
            'availableforsale.required' => 'available for sale is required.',
            'soldby.required' => 'sold by is required.',
            'status.required' => 'status is required.',
            'id_U.required' => 'user is required.',
            'id_Discount.required' => 'Discount is required.',
            'id_Unit.required' => 'Unit is required.',
            'id_Cat.required' => 'Cat is required.',
            'id_Brand.required' => 'Brand is required.',
        ];
    }
}
