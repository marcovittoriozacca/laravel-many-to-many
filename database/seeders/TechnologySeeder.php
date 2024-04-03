<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $techonologies = [
            'HTML',
            'CSS',
            'JavaScript',
            'jQuery',
            'Node.js',
            'Express.js',
            'React.js',
            'Vue3',
            'Laravel',
        ];

        foreach($techonologies as $techonology){
            Technology::create([
                'name' => $techonology,
                'slug' => Str::slug($techonology, '-'),
            ]);
        };

    }
}
