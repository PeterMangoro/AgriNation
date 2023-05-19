<?php

namespace App\Http\Requests\Plant;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlantRequest extends FormRequest
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
            'stage' => 'required|max:255',
            'detail' => 'required|string',
            'date' => 'required|date',
            'batch' => 'required|max:255',
            'total_plants' => 'required|max:255',
            'images.*' => 'nullable|mimes:png,jpg,gif,bmp,webp|max:2040',
            'images' => 'nullable',
            'document' => 'nullable|required_with:document_title|mimes:csv,txt,xlx,xls,pdf,odt,doc,docx.rtf|max:5120',
            'document_title' => 'nullable|required_with:document',
            'locations.*' => 'required|integer',
            'locations' => 'required_without:nursery_location', #validate if array exists
            'nursery_location'=>'required_without:locations'

        ];
    }
}
