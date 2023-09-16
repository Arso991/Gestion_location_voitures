<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        "nom_voiture",
        "boite_vitesse",
        "puissane",
        "nbre_porte",
        "carburant",
        "nbre_cylindre",
        "soupape",
        "vitesse_max",
        "carosserie",
        "transmission",
        "frein",
        "acceleration",
        "image_principale",
        "image_3",
        "image_2",
        "couleur",
        "modele_id"
    ];
    protected $table = 'cars';

    public function modele(){
        return $this->belongsTo(Modele::class, "modele_id", "id");
    }
}

