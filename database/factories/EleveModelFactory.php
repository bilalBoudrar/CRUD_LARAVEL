<?php

namespace Database\Factories;

use App\Models\ClubModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EleveModel>
 */
class EleveModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'prenom' => fake()->name(),
            'id_club' => ClubModel::inRandomOrder()->first()->id,
        ];
    }
}
