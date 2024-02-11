<?php

namespace Database\Factories;

use App\Models\entreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\statistique>
 */
class StatistiqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Type_statistique' => $this->faker->numberBetween(1, 5), 
            'entreprise_id' => entreprise::factory(),
            'Date_statistique' => $this->faker->dateTimeThisMonth(),
            'Valeur_statistique' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
