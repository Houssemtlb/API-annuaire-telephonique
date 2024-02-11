<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statistique extends Model
{
    use HasFactory;

    public function entreprise(){
        return $this->belongsTo(entreprise::class);
    }

    protected $fillable = [
        'Type_statistique',
        'entreprise_id',
        'Date_statistique',
        'Valeur_statistique',
    ];

}
