<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localisation extends Model
{
    use HasFactory;

    public function entreprise(){
        return $this->belongsTo(entreprise::class);
    }

    protected $fillable = [
        'Commune',
        'Wilaya',
        'Ville',
        'Localisation',
        'Num_Porte',
        'Batiment',
        'Adresse',
        'Rue',
        'Etage',
        'entreprise_id',
    ];
    
}
