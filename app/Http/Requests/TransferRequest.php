<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
            'DateOfTransferOrder' => 'required|string|max:100',
            'SourceStore' => 'required|string|max:100',
            'DestinationStore' => 'required|string|max:100',
            'Reference' => 'required|string|max:100',
            'GrandTotal' => 'required|string|max:100',
            'notes' => 'nullable|string|max:100',
            'status' => 'required|string|max:100',
            'id_Store' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'DateOfTransferOrder.required' => 'Date Of Transfer Order is required.',
            'SourceStore.required' => 'Source Store is required.',
            'DestinationStore.required' => 'Destination Store is required.',
            'Reference.required' => 'Reference is required.',
            'GrandTotal.required' => 'Grand Total is required.',
            'status.required' => 'status is required.',
            'id_Store.required' => 'Store is required.',
        ];
    }
}
