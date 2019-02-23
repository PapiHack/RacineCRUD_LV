<?php

namespace RacineCRUD\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurUpdateRequest extends FormRequest
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
        $path_array = explode('/', $this->path());
        $id = $path_array[count($path_array) - 1];

        return [
            'nom' => 'required|alpha|min:3|max:255',
            'prenom' => 'required|alpha|min:3|max:255',
            'password' => 'required|min:4|confirmed',
            'email' => 'required|max:255|email|unique:utilisateur,email, '. $id,
            'tel' => 'required|unique:utilisateur,tel, '. $id,
        ];
    }
}
