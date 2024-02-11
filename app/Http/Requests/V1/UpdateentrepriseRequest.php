<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateentrepriseRequest extends FormRequest
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
            'raisonSociale' => 'required|string',
            'logo' => 'sometimes', 
            'description' => 'required|string',
            'secteurActivite' => 'required|string',
            'adresse' => 'required|string',
            'telephone' => 'required|string', 
            'email' => 'required|string|email', 
            'siteweb' => 'required|string',
            'nomAnnonceur' => 'required|string',
            'prenomAnnonceur' => 'required|string',
            'civilite' => 'required|string',
            'posteOccupe' => 'required|string',
            'rue' => 'required|string',
            'batiment' => 'required|string',
            'etage' => 'required|integer',
            'numPorte' => 'required|integer',
            'wilaya' => 'required|string',
            'commune' => 'required|string',
            'telMobile' => 'required|string',
            'positionGeographique' => 'required|string', 
            'categorieId' => 'required|integer', 
        ];                 
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'Raison_sociale' => $this->raisonSociale,
            'logo' => $this->logo,
            'Description' => $this->description,
            'secteur_activite' => $this->secteurActivite,
            'Adresse' => $this->adresse,
            'Telephone' => $this->telephone,
            'e-mail' => $this->email,
            'siteweb' => $this->siteweb,
            'Nom_Annonceur' => $this->nomAnnonceur,
            'Prenom_Annonceur' => $this->prenomAnnonceur,
            'Civilte' => $this->civilite,
            'Poste_Occupe' => $this->posteOccupe,
            'Rue' => $this->rue,
            'Batiment' => $this->batiment,
            'Etage' => $this->etage,
            'Num_Porte' => $this->numPorte,
            'Wilaya' => $this->wilaya,
            'Commune' => $this->commune,
            'Tel_Mobile' => $this->telMobile,
            'Position_geographique' => $this->positionGeographique,
            'categorie_id' => $this->categorieId,
        ]);
    }
}
