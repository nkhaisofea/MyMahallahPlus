<?php

namespace Database\Factories;

use App\Enums\MahallahGender;
use App\Models\Mahallah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mahallah>
 */
class MahallahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Mahallah '.fake()->unique()->firstName(),
            'code' => fake()->unique()->bothify('M??##'),
            'gender' => fake()->randomElement(MahallahGender::cases()),
        ];
    }
}
