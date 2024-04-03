<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Applicazione Web',
            'Applicazione Mobile',
            'Applicazione Desktop',
            'Sisteme Embedded',
            'Intelligenza Artificiale e Machine Learning',
            'Sicurezza Informatica',
            'Front-End',
            'Back-End',
            'Full Stack',
        ];

        foreach ($types as $type) {
            Type::create([
                'name' => $type,
                'slug' => Str::slug($type, '-'),
            ]);
        }
    }
}
