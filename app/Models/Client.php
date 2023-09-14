<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ["nom", "prenom", "tel", "address", "photo", "cni", "email"];

    protected $table = "clients";
}
