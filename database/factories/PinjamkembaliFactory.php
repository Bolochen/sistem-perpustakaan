<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pinjamkembali>
 */
class PinjamkembaliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mahasiswa_id' => mt_rand(1,15),
            'buku_id' => mt_rand(1,10),
            'tgl_pinjam' => today(),
            'tgl_tempo' => fake()->dateTimeBetween('+0 days', '+7 days'),
            'tgl_kembali' => fake()->dateTimeBetween('+1 days', '+6 days')
        ];
    }
}
