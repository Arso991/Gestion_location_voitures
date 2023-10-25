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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->dateTime("date_sortie")->nullable();
            $table->dateTime("date_prevue")->nullable();
            $table->dateTime("date_retour")->nullable();
            $table->string("observation")->nullable();
            $table->foreignId("id_client")->constrained("clients")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("id_voiture")->constrained("cars")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
