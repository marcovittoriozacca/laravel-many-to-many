<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            User::create([
            "name" => fake()->userName(),
            "email" => fake()->unique()->email(),
            "password" => "12345678",
            ]);
        }

    }
}
