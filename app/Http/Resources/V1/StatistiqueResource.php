<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatistiqueResource extends JsonResource
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
            'typeStatistique' => $this->Type_statistique,
            'entrepriseId' => $this->entreprise_id,
            'dateStatistique' => $this->Date_statistique,
            'valeurStatistique' => $this->Valeur_statistique,
        ];
    }
}
