<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    public function definition()
    {
        return [
            'nama_kelas' => $this->faker->words(2, true),
            'deskripsi' => $this->faker->sentence(),
            'instruktur' => $this->faker->name(),
        ];
    }
}
