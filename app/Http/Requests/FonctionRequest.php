<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FonctionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fonction' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id'
        ];
    }

    public function messages()
    {
        return [
            'fonction.required' => 'Fonction à remplir obligatoirement',
            'departement_id' => 'Département obligatoire'
        ];
    }
}
