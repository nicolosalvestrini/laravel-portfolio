<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'technologies'])
            ->orderByDesc('created_at')
            ->get();

        return response()->json($projects);
    }

    public function show(Project $project)
    {
        $project->load(['type', 'technologies']);

        return response()->json($project);
    }
}