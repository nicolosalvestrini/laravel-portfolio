<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'github_url',
        'project_url',
        'completed_at',
    ];

     protected function casts(): array
    {
        return [
            'completed_at' => 'date',
        ];
    }


}
