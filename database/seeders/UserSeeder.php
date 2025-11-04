<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@ijazplus.com',
            'password' => Hash::make('Admin@12345'),
            'role' => 'admin',
        ]);

        // Create 9 Creator users
        for ($i = 1; $i <= 9; $i++) {
            User::create([
                'name' => "Creator $i",
                'email' => "creator{$i}@ijazplus.com",
                'password' => Hash::make('Creator@12345'),
                'role' => 'creator',
            ]);
        }
    }
}
