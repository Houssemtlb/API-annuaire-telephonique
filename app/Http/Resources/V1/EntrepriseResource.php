<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntrepriseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'raisonSociale' => $this->Raison_sociale,
            'logo' => $this->logo,
            'description' => $this->Description,
            'secteurActivite' => $this->secteur_activite,
            'adresse' => $this->Adresse,
            'telephone' => $this->Telephone,
            'email' => $this->{'e-mail'}, 
            'siteweb' => $this->siteweb,
            'nomAnnonceur' => $this->Nom_Annonceur,
            'prenomAnnonceur' => $this->Prenom_Annonceur,
            'civilite' => $this->Civilte,
            'posteOccupe' => $this->Poste_Occupe,
            'rue' => $this->Rue,
            'batiment' => $this->Batiment,
            'etage' => $this->Etage,
            'numPorte' => $this->Num_Porte,
            'wilaya' => $this->Wilaya,
            'commune' => $this->Commune,
            'telMobile' => $this->Tel_Mobile,
            'positionGeographique' => $this->Position_geographique,
            'categorieId' => $this->categorie_id,
            'userId' => $this->user_id,
            'apparaitre' => $this->Apparaitre,
            'localisations' => LocalisationResource::collection($this->localisations),
            'contacts' => ContactResource::collection($this->contacts),
            'statistiques' => StatistiqueResource::collection($this->statistiques),
        ];
    }
}
