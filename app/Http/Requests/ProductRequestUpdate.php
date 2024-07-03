<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequestUpdate extends FormRequest
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
        return 
        [
            //
            'title'=> 'required|string',
            'category_title' => 'required|string|exists:categories,title', 
            'price'=>'required|numeric',
            'photo'=>'image|mimes:jpeg,png,jpg,gif',
            'detail'=>'required|string',
        ];
    }


    public function messages(){

        return 
        [
            //
            'title.required'=> 'Le titre du produit est requis',
            'title.string'=> 'Le titre du produit ne doit contenir que des caractères',
            'price.numeric'=>"Le prix ne doit qu'être du chiffre",

            // 'category_title' => 'required|string|exists:categories,title', 
            // 'price'=>'required|numeric',
            'photo.image'=>'Le fichier doit être une image de type jpeg, png, jpg ou gif',
            'detail.required'=>'Le champ détail est requis',
            'detail.string'=>'Le champ détail ne doit contenir que des caractères',

        ];

    }
}
