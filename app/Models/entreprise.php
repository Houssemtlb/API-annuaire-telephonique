<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entreprise extends Model
{
    use HasFactory;
    public function contacts(){
        return $this->hasMany(contact::class);
    }
    public function localisations(){
        return $this->hasMany(localisation::class);
    }
    public function statistiques(){
        return $this->hasMany(statistique::class);
    }
    public function categorie(){
        return $this->belongsTo(categorie::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'Raison_sociale',
        'logo',
        'Description',
        'secteur_activite',
        'Adresse',
        'Telephone',
        'e-mail',
        'siteweb',
        'Nom_Annonceur',
        'Prenom_Annonceur',
        'Civilte',
        'Poste_Occupe',
        'Rue',
        'Batiment',
        'Etage',
        'Num_Porte',
        'Wilaya',
        'Commune',
        'Tel_Mobile',
        'Position_geographique',
        'categorie_id',
        'user_id',
        'Apparaitre'
    ]; 
    
}
