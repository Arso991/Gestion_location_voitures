<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        "date_sortie",
        "date_prevue",
        "date_retour",
        "observation",
        "id_client",
        "id_voiture"
    ];
    protected $table = 'locations';

    public function client(){
        return $this->belongsTo(Client::class, "id_client", "id");
    }

    public function voiture(){
        return $this->belongsTo(Car::class, "id_voiture", "id");
    }
}
