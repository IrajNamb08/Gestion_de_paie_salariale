<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
        $rules =  [
            'nom' => 'required|string|max:255',
            'email' => ['required',Rule::unique('users')->ignore($this->id)],
            // 'password' => 'required',
            'role' => 'required|integer'
        ];
        if ($this->isMethod('post')) {
            // Lors de la création d'un utilisateur
            $rules['password'] = 'required';
        } elseif ($this->isMethod('put')) {
            // Lors de la mise à jour d'un utilisateur
            $rules['password'] = 'nullable';
        }

        return $rules;
    }
    public function messages()
    { 
        return[
            'nom.required' =>  'Nom obligatoire',
            'email.required' => 'email obligatoire',
            'email.unique' => 'email unique',
            'password.required' => 'Mot de passe obligatoire',
            'role.required' => 'Role obligatoire'
        ];
    }
}
