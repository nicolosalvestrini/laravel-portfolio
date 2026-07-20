<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.projects.create', compact('types'));
    }

    public function store(Request $request)
    {
        Project::create($request->all());

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

        return view('admin.projects.edit', compact('project', 'types'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

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
