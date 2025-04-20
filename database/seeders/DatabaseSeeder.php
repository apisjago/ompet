<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        user::create([
        'name' => 'Nicholl',
        'role' => 'admin',
        'email' => 'nicholl@gmail.com',
        'password' => Hash::make("nicholl@gmail.com")
        ]);

        User::create([
        'name' => 'BANK',
        'role' => 'bank',
        'email' => 'bank@gmail.com',
        'password' => Hash::make("bank@gmail.com")
        ]);

    }     
}