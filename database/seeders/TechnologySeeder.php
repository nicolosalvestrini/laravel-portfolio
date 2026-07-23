<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = [
            'PHP',
            'Laravel',
            'JavaScript',
            'Vue.js',
            'Bootstrap',
            'MySQL',
            'HTML',
            'CSS',
        ];

        foreach ($technologies as $technology) {
            Technology::updateOrCreate(['name' => $technology]);
        }
    }
}
