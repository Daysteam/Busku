<?php

namespace Database\Seeders;

use App\Models\DetailPemesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPemesanan::factory()->count(100)->create();
    }
}
