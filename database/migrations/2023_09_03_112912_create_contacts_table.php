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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();                         //UNSIGNED ???
            $table->string('entreprise_id');        //not an integer 
            $table->string('Nom');
            $table->string('Prenom');
            $table->char('Civilite');
            $table->string('Poste_Occupe');
            $table->string('Num_Telephone');        //not integer
            $table->string('Adress_Email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
