<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\entreprise;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\localisation>
 */
class LocalisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Commune' => $this->faker->city,
            'Wilaya' => $this->faker->state,
            'Ville' => $this->faker->city,
            'Localisation' => $this->faker->latitude() . ',' . $this->faker->longitude(),
            'Num_Porte' => $this->faker->numberBetween(1, 100),
            'Batiment' => $this->faker->buildingNumber,
            'Adresse' => $this->faker->streetAddress,
            'Rue' => $this->faker->streetName,
            'Etage' => $this->faker->numberBetween(1, 10),
            'entreprise_id' => entreprise::factory(),
        ];
    }
}
