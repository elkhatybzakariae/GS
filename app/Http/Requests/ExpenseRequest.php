<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'amount' => 'required|string|max:100',
            'reference' => 'required|string|max:100',
            'expensefor' => 'required|string|max:100',
            'description' => 'nullable|string|max:100',
            'status' => 'required|string|max:100',
            'id_Cat' => 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => 'date is required.',
            'amount.required' => 'amount is required.',
            'reference.required' => 'reference is required.',
            'expensefor.required' => 'expensefor is required.',
            'status.required' => 'status is required.',
            'id_Cat.required' => 'id_Cat is required.',
        ];
    }
}
