<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CampeonatoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'data_inicio' => now(),
        ];
    }
}
