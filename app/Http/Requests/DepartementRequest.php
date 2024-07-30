<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartementRequest extends FormRequest
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
            'departement' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return[
            'departement.required' => 'Département à remplir obligatoirement',
            'departement.string' => 'Département en chaîne de caractères',
        ];
    }
}
