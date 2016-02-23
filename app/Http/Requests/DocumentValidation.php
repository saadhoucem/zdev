<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DocumentValidation extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'titre' => 'required',
            'fichier' => 'required',
            'image' => 'required',
            'categorie_id' => 'required',
            'auteur_id' => 'required',
        ];
    }
}
