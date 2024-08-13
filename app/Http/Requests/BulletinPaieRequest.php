<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BulletinPaieRequest extends FormRequest
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
            'employer_id' => 'required|integer',
            'mois' => 'required|date',
            'salaire_brute' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'employer_id.required' => 'L\'identifiant de l\'employeur est requis',
            'employer_id.integer' => 'L\'identifiant de l\'employeur doit être un
            nombre entier',
            'mois.required' => 'Le mois est requis',
            'mois.date' => 'Le mois doit être une date',
            'salaire_brute.required' => 'Le salaire brut est requis',
            'salaire_brute.numeric' => 'Le salaire brut doit être un nombre
            entier'
        ];
    }
}
