<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->randomNumber(5, true),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'alamat' => fake()->sentence(3)
        ];
    }
}
