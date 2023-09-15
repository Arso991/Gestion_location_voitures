<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateur extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "utilisateurs";
    protected $primaryKey = 'id_user'; 
    protected $fillable = [
        "nom",
        "prenom",
        "email",
        "password",
        "email_verified",
        "email_verify_at"
    ];
}
