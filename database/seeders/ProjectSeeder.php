<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10 ; $i++) {
            $name = fake()->unique()->words(rand(1,4), true);
            Project::create([
                "name" => $name,
                "description" => fake()->sentence(rand(10,25), true),
                "link" => fake()->url(),
                "proj_thumb" => fake()->imageUrl(),
                "slug" => Str::slug($name, '-'),
            ]);
        }
    }
}
