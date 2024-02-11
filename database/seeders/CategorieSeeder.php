<?php

namespace Database\Seeders;

use App\Models\categorie;
use App\Models\contact;
use App\Models\entreprise;
use App\Models\localisation;
use App\Models\statistique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        categorie::factory(5)->create()->each(function($categorie){
            $categorie->entreprises()->saveMany(entreprise::factory(5)->create(['categorie_id' => $categorie->id,])
            ->each(function ($entreprise) 
            {
                $entreprise->user_id = 1;  //the first admin 
                $entreprise->contacts()->saveMany(contact::factory(5)->create([
                    'entreprise_id' => $entreprise->id,
                ]));
    
                $entreprise->localisations()->saveMany(localisation::factory(rand(1, 2))->create([
                    'entreprise_id' => $entreprise->id,
                ]));
    
                $entreprise->statistiques()->saveMany(statistique::factory(5)->create([
                    'entreprise_id' => $entreprise->id,
                ]));
            }));
        });
    }
        
}
