<?php

namespace App\Http\Requests\Chemical;

use Illuminate\Foundation\Http\FormRequest;

class CreateChemicalRequest extends FormRequest
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
            'title' => 'required|max:255',
            'type' => 'required|max:255',
            'detail' => 'required|string',            
        ];
    }
}
