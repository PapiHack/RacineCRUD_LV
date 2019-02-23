<?php

namespace RacineCRUD\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurCreateRequest extends FormRequest
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
            'nom' => 'required|alpha|min:3|max:255',
            'prenom' => 'required|alpha|min:3|max:255',
            'email' => 'required|email|unique:utilisateur',
            'password' => 'required|min:4|confirmed',
            'tel' => 'required|numeric|unique:utilisateur',
        ];
    }
}
