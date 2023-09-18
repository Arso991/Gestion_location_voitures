<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("nom_voiture");
            $table->string("boite_vitesse");
            $table->integer("puissane");
            $table->integer("nbre_porte");
            $table->string("carburant");
            $table->integer("nbre_cylindre");
            $table->integer("soupape");
            $table->integer("vitesse_max");
            $table->string("carosserie");
            $table->string("transmission");
            $table->string("frein");
            $table->integer("acceleration");
            $table->string("image_principale");
            $table->string("image_3")->nullable();
            $table->string("image_2")->nullable();
            $table->string("couleur");
            $table->foreignId("modele_id")->constrained("modele")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
