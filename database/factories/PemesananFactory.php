<?php

namespace Database\Factories;

use App\Models\Rute;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemesanan>
 */
class PemesananFactory extends Factory
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
            'rute_id' => Rute::inRandomOrder()->first()->id,
            'jumlah_tiket' => fake()->numberBetween(1,4),
            'total_harga' => fake()->numberBetween(1000,1000000),
            'kode_pemesanan' => 'PSN-' . strtoupper(Str::random(8)),
            'qr_code' => fake()->uuid(),
            'status' => fake()->randomElement(['pending','dibayar','batal']),
        ];
    }
}
