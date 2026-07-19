<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Laravel Portfolio',
                'description' => 'Portfolio personale sviluppato con Laravel, autenticazione Breeze, area amministrativa protetta e gestione CRUD dei progetti.',
                'cover_image' => null,
                'github_url' => 'https://github.com/nicolosalvestrini/laravel-portfolio',
                'project_url' => null,
                'completed_at' => '2026-07-19',
            ],
            [
                'title' => 'Laravel Migration Seeder',
                'description' => 'Applicazione Laravel per visualizzare e gestire dati relativi ai treni, utilizzando migration, seeder, Faker, model e controller.',
                'cover_image' => null,
                'github_url' => 'https://github.com/nicolosalvestrini/laravel-migration-seeder',
                'project_url' => null,
                'completed_at' => '2026-07-15',
            ],
            [
                'title' => 'Laravel Model Controller',
                'description' => 'Applicazione Laravel collegata a un database di film, realizzata seguendo il pattern MVC con model, controller e view Blade.',
                'cover_image' => null,
                'github_url' => 'https://github.com/nicolosalvestrini/laravel-model-controller',
                'project_url' => null,
                'completed_at' => '2026-07-11',
            ],
            [
                'title' => 'Laravel Comics',
                'description' => 'Riproduzione di una pagina DC Comics sviluppata con Laravel, Blade, Bootstrap, layout, partial e componenti riutilizzabili.',
                'cover_image' => null,
                'github_url' => 'https://github.com/nicolosalvestrini/laravel-comics',
                'project_url' => null,
                'completed_at' => '2026-07-01',
            ],
            [
                'title' => 'Laravel Primi Passi',
                'description' => 'Primo progetto Laravel dedicato a routing e Blade, con pagine Home, About e Contact e una navigazione riutilizzabile.',
                'cover_image' => null,
                'github_url' => 'https://github.com/nicolosalvestrini/laravel-primi-passi',
                'project_url' => null,
                'completed_at' => '2026-06-28',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['github_url' => $project['github_url']],
                $project
            );
        }
    }
}
