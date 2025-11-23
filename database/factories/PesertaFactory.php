<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PesertaFactory extends Factory
{
    public function definition()
    {
        return [
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telepon' => fake()->numerify('08##########'),
            'alamat' => fake()->address(),
        ];
    }
}
