<?php

namespace App\Http\Requests\courses;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
    public function rules()
    {
        return [
            'titre'                => ['required', 'string'],
            'adresse_depart'       => ['required', 'string'],
            'adresse_livraison'    => ['required', 'string'],
            //'date_de_livraison'    => ['required', 'date'],
            'description'          => ['required', 'string'],
            //'numero_client'        => ['required', 'integer'],
        ];
    }

    public function message()
    {
        return[
            'titre.required'                => 'Le title est requise.',
            'titre.string'                  => 'Le title doit être une chaîne de caractère.',
            
            'adresse_depart.required'                => 'L\'adresse de départ est requise.',
            'adresse_depart.string'                  => 'L\'adresse de depart doit être une chaîne de caractère.',
            
            'adresse_livraison.required'                => 'L\'adresse de livraison est requise.',
            'adresse_livraison.string'                  => 'L\'adresse de livraison doit être une chaîne de caractère.',

            'date_de_livraison.required'                => 'La date de livraison est requise.',
            'date_de_livraison.date'                  => 'La date de livraison doit être sous la forme d\'une date.',

            'description.required'                => 'La description est requise.',
            'description.string'                  => 'La description doit être une chaîne de caractère.',

            'numero_client.required'                => 'Le numero du client est requise.',
            'numero_client.integer'                  => 'Le numero du client doit être sous forme de chiffre.',

        ];
    }
}
