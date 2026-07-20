<?php

<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Web Design',
            'Graphic Design',
            'Front End',
            'Back End',
            'Full Stack',
            'Mobile',
        ];

    }
}