<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Rute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rute>
 */
class RuteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bus_id' => Bus::inRandomOrder()->first()->id,
            'kota_tujuan' => fake()->city(),
            'kota_asal' => fake()->city(),
            'tanggal_berangkat' => fake()->date(),
            'jam_berangkat' => fake()->time(),
            'harga' => fake()->numberBetween(1000,100000)
        ];
    }
}
