<?php

namespace Database\Seeders;

use App\Models\Rute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rute::factory()
            ->count(20)
            ->create();
    }
}
