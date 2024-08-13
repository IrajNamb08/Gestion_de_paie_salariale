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
            'profil'=> 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:3000',
            'cin' => 'required|integer',
            'numCnaps' => 'nullable|integer',
            'salaire' => 'required|numeric',
            'dateEmbauche' => 'required|date',
            'contrat' => 'required|string',
        ];
    }
    public function messages()
    {
        return[
            'nom.required' => 'le nom est obligatoire',
            'prenom.required' => 'le prenom est obligatoire',
            'adresse.required' => 'l adresse est obligatoire',
            'telephone.required' => 'le telephone est obligatoire',
            'sexe.required' => 'le sexe est obligatoire',
            'profil.mimes' => 'le profil doit etre dans un des formats suivant :jpeg,png,jpg,gif,svg,webp',
            'profil.max' => 'le profil ne doit pas depasser 3Mo',
            'cin.required' => 'le cin est obligatoire',
            'numCnaps.required' => 'le numCnaps est obligatoire',
            'salaire.required' => 'le salaire est obligatoire',
            'dateEmbauche.required' => 'la date d embauche est obligatoire',
            'contrat.required' => 'le contrat est obligatoire',
        ];
    }
}
