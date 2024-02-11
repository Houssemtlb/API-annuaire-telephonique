<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorieResource extends JsonResource
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
            'nomCategorie' => $this->Nom_Categorie,
            'description' => $this->Description,
            'entreprises' => EntrepriseResource::collection($this->entreprises),
        ];
    }
}
