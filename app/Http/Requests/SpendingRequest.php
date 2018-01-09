<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpendingRequest extends FormRequest
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
            'title' => 'required',
            'price' => 'required|numeric|min:1',
            'users' => 'required',
            'users.*' => 'numeric',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Titre obligatoire',
            'description.required'  => 'Description obligatoire',
            'users.required' => 'Vous devez sélectionner au moins un utilisateur',
            'price.numeric' => 'La valeur doit être un numérique positif',
            'price.min' => 'Attention la valeur min est 1'
        ];
    }
}
