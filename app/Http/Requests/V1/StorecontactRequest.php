<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorecontactRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'entrepriseId' => 'required|integer',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'civilite' => 'required|string',
            'posteOccupe' => 'required|string',
            'numTelephone' => 'required|string',
            'adresseEmail' => 'required|email',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'entreprise_id' => $this->entrepriseId,
            'Nom' => $this->nom,
            'Prenom' => $this->prenom,
            'Civilite' => $this->civilite,
            'Poste_Occupe' => $this->posteOccupe,
            'Num_Telephone' => $this->numTelephone,
            'Adress_Email' => $this->adresseEmail,
        ]);
        
    }
}
