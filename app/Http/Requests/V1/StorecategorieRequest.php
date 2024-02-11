<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;    //dont forget to import this 

class StorecategorieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  //temporarly 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array   //have to be in json format 
    {
        return [
            'nomCategorie' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'Nom_Categorie' => $this->nomCategorie,
            'Description' => $this->description,
        ]);
    }
}
