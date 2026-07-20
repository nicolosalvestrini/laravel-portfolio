<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TypeSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TypeSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
