<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TimeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->name,
            'data_inscricao' => now(),
            'pontos' => 0
        ];
    }
}
