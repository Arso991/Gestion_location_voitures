<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ["marque_name", "category_id"];
    protected $table = 'brands';

    public function category(){
        return $this->belongsTo(Car_category::class, "category_id", "id");
    }
}
