<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    
    public function entreprise(){
        return $this->belongsTo(entreprise::class);
    }

    protected $fillable = [
        'entreprise_id',
        'Nom',
        'Prenom',
        'Civilite',
        'Poste_Occupe',
        'Num_Telephone',
        'Adress_Email',
    ];
}
