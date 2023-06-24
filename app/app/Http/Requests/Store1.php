<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store1 extends FormRequest
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
            'image'=>['required'],
            'titre'=>['required','unique:annonces'],
            'description'=> ['required'],
            'prix'=>['integer','required'],
            'id_ville' => 'required|integer'

            
        ];
    }
}
