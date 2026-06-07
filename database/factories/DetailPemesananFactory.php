<?php

namespace Database\Factories;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPemesanan>
 */
class DetailPemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pemesanan_id' => Pemesanan::inRandomOrder()->first()->id,
            'nama_penumpang' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['pria','wanita']),
            'umur' => fake()->numberBetween(1,60)
        ];
    }
}
