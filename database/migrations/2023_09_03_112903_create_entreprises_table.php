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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('Raison_sociale');
            $table->string('logo')->nullable();                          //for now 
            $table->string('Description',5000);
            $table->string('secteur_activite');
            $table->string('Adresse');
            $table->string('Telephone');                       //not integer
            $table->string('e-mail');
            $table->string('siteweb');
            $table->string('Nom_Annonceur');
            $table->string('Prenom_Annonceur');
            $table->string('Civilte');
            $table->string('Poste_Occupe');
            $table->string('Rue');
            $table->char('Batiment');
            $table->integer('Etage');
            $table->integer('Num_Porte');
            $table->string('Wilaya');
            $table->string('Commune');
            $table->string('Tel_Mobile');
            $table->string('Position_geographique');         //for now
            $table->string('categorie_id');
            $table->string('user_id')->default(1);
            $table->boolean('Apparaitre')->default(true);                  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
