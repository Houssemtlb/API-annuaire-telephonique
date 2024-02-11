<?php

namespace Database\Factories;

use App\Models\categorie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\entreprise>
 */
class EntrepriseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Raison_sociale' => $this->faker->company,
            'logo' => 'empty for now',
            'Description' => $this->faker->paragraph,
            'secteur_activite' => $this->faker->word,
            'Adresse' => $this->faker->address,
            'Telephone' => $this->faker->phoneNumber(),
            'e-mail' => $this->faker->unique()->safeEmail,
            'siteweb' => $this->faker->url,
            'Nom_Annonceur' => $this->faker->firstName,
            'Prenom_Annonceur' => $this->faker->lastName,
            'Civilte' => $this->faker->title,
            'Poste_Occupe' => $this->faker->jobTitle,
            'Rue' => $this->faker->streetName,
            'Batiment' => $this->faker->buildingNumber,
            'Etage' => $this->faker->numberBetween(1, 10),
            'Num_Porte' => $this->faker->numberBetween(1, 100),
            'Wilaya' => $this->faker->state,
            'Commune' => $this->faker->city,
            'Tel_Mobile' => $this->faker->phoneNumber,
            'Position_geographique' => $this->faker->latitude() . ',' . $this->faker->longitude(),
            'categorie_id' => categorie::factory(),
            'user_id' => 1,  //first admin who created
        ];
    }
}
