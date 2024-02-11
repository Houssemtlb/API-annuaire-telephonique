<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;

    public function entreprises(){
        return $this->hasMany(entreprise::class);
    }

    protected $fillable = [
        'Nom_Categorie',
        'Description',
    ];
}
