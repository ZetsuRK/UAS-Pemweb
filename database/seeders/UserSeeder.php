<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Wartawan
        User::updateOrCreate(
            ['email' => 'wartawan@example.com'],
            [
                'name' => 'Wartawan',
                'password' => Hash::make('password'),
                'role' => 'wartawan',
            ]
        );

        // Editor
        User::updateOrCreate(
            ['email' => 'editor@example.com'],
            [
                'name' => 'Editor',
                'password' => Hash::make('password'),
                'role' => 'editor',
            ]
        );
    }
}
