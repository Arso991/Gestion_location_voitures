<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    protected $fillable = ["modele_name", "annee", "brands_id"];
    protected $table = 'modele';

    public function brand(){
        return $this->belongsTo(Brand::class, "brands_id", "id");
    }
}
