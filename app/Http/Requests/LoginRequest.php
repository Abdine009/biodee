<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'email'=>'required|email',
            'email.email'=>"Veuillez saisir une adresse mail valide.",
            'password' => 'required|min:4'
        ];

    }
        public function messages(){
            return [
                'email.required' => "L'email est requis.",
                'email.email'=>"Veuillez saisir une adresse mail valide.",
                'password.required'=>"Le mot de passe est requis.",
                'password.min'=>"la longueur min du mot de passe est de 4 caractères",
            ];
        }
    
}
