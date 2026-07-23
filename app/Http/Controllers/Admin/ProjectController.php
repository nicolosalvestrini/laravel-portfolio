<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->paginate(9);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::orderBy('name')->get();
        $technologies = Technology::orderBy('name')->get();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $project = Project::create($request->all());

        $project->technologies()->sync($request->technology_ids ?? []);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Progetto creato con successo.');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::orderBy('name')->get();
        $technologies = Technology::orderBy('name')->get();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        $project->technologies()->sync($request->technology_ids ?? []);

        return redirect()
            ->route('admin.projects.show', $project)
            ->with('success', 'Progetto aggiornato con successo.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Progetto eliminato con successo.');
    }
}
