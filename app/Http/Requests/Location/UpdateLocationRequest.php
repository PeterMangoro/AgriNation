<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
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
            'area' => 'required|max:255',
            'detail' => 'required|string',   
            'images.*' => 'nullable|mimes:png,jpg,gif,bmp,webp|max:2040',
            'images' => 'nullable',
            'document' => 'nullable|required_with:document_title|mimes:csv,txt,xlx,xls,pdf,odt,doc,docx.rtf|max:5120',
            'document_title' => 'nullable|required_with:document',
        ];
    }
}
