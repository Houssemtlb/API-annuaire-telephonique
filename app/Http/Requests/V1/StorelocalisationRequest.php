<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorelocalisationRequest extends FormRequest
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
            'commune' => 'required|string',
            'wilaya' => 'required|string',
            'ville' => 'required|string',
            'localisation' => 'required|string',
            'numPorte' => 'required|integer',
            'batiment' => 'required|string',
            'adresse' => 'required|string',
            'rue' => 'required|string',
            'etage' => 'required|integer',
            'entrepriseId' => 'required|integer', // Note: 'entreprise_id' should match the field name in the database.
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'Commune' => $this->commune,
            'Wilaya' => $this->wilaya,
            'Ville' => $this->ville,
            'Localisation' => $this->localisation,
            'Num_Porte' => $this->numPorte,
            'Batiment' => $this->batiment,
            'Adresse' => $this->adresse,
            'Rue' => $this->rue,
            'Etage' => $this->etage,
            'entreprise_id' => $this->entrepriseId,
        ]);
    }

    
}
