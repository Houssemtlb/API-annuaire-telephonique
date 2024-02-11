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
        Schema::create('localisations', function (Blueprint $table) {
            $table->id();
            $table->string('Commune');
            $table->string('Wilaya');
            $table->string('Ville');
            $table->string('Localisation');            //for now
            $table->integer('Num_Porte');
            $table->char('Batiment');
            $table->string('Adresse');
            $table->string('Rue');
            $table->integer('Etage');
            $table->string('entreprise_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localisations');
    }
};
