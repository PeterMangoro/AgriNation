<?php

namespace App\Http\Requests\Fertilization;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFertilizationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'locations.*' => 'required|integer',
            'fertilizers.*' => 'required|integer',
            'plants.*' => 'required|integer',
            'date' => 'required|date',
            'detail' => 'required|string',
        ];
    }
}
