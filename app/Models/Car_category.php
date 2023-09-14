<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_category extends Model
{
    protected $fillable = ["name"];

    protected $table = "car_category";
}
