<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'entrepriseId' => $this->entreprise_id,
            'nom' => $this->Nom,
            'prenom' => $this->Prenom,
            'civilite' => $this->Civilite,
            'posteOccupe' => $this->Poste_Occupe,
            'numTelephone' => $this->Num_Telephone,
            'adresseEmail' => $this->Adress_Email,
        ];
    }
}
