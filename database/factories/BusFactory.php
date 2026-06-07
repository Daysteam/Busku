<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'kode_bus' => fake()->name(),
            'nama_bus' => fake()->name(),
            'jumlah_kursi' => fake()->randomNumber(),
            'tipe_bus' => fake()->randomElement(['ekonomi','eksekutive','vip']),
            'image' => null
        ];
    }
}
