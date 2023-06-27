<?php

namespace App\Http\Requests\Finance\Income;

use Illuminate\Foundation\Http\FormRequest;

class CreateIncomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'source' => 'required|max:255',
            'currency' => 'required|max:255',            
            'price' => 'required|numeric|min:0',
            'rate' => 'nullable|numeric|min:0',            
            'detail' => 'required|string',
            'date' => 'required|date',
        ];
    }
}
