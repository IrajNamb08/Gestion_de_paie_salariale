<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
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
            'nom'=> 'required|string|max:255',
            'prenom'=> 'required|string|max:255',
            'adresse'=> 'required|string|max:255',
            'telephone'=> 'required|string|max:10',
            'sexe'=> 'required|string|max:20',
            'profil'=> 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'cin' => 'required|integer',
            'numCnaps' => 'required|integer',
            'salaire' => 'required|decimal:1,100000000000',
            'dateEmbauche' => 'required|date',
        ];
    }
}
