<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a user
        $user = User::create([
            'name' => \Faker\Factory::create()->name(),
            'email' => \Faker\Factory::create()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'description' => \Faker\Factory::create()->paragraph(),
            'profession' => \Faker\Factory::create()->jobTitle(),
            'phone' => \Faker\Factory::create()->phoneNumber(),
            'status' => \Faker\Factory::create()->randomElement([1, 2, 3]), // Randomly choose status from 1, 2, or 3
            
        ]);

        $user->assignRole('admin');


    }
}
