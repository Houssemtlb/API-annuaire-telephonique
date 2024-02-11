<?php

namespace Database\Factories;

use App\Models\entreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'entreprise_id' => entreprise::factory(),
            'Nom' => $this->faker->lastName,
            'Prenom' => $this->faker->firstName,
            'Civilite' => $this->faker->title,
            'Poste_Occupe' => $this->faker->jobTitle,
            'Num_Telephone' => $this->faker->phoneNumber,
            'Adress_Email' => $this->faker->unique()->safeEmail,
        ];
    }
}
