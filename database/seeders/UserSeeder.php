<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => RoleEnum::ADMIN->value
        ]);

        User::create([
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('password'),
            'role' => RoleEnum::PETUGAS->value
        ]);

        User::create([
            'username' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('password'),
            'role' => RoleEnum::CUSTOMER->value
        ]);

        User::factory()
            ->count(10)
            ->create();
    }
}
