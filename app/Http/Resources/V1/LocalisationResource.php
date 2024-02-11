<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocalisationResource extends JsonResource
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
            'commune' => $this->Commune,
            'wilaya' => $this->Wilaya,
            'ville' => $this->Ville,
            'localisation' => $this->Localisation,
            'numPorte' => $this->Num_Porte,
            'batiment' => $this->Batiment,
            'adresse' => $this->Adresse,
            'rue' => $this->Rue,
            'etage' => $this->Etage,
            'entrepriseId' => $this->entreprise_id,];
    }
}
