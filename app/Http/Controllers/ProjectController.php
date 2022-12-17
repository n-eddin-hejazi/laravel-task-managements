<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }


    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Project::create($data);
        return redirect('/projects');
    }


    public function show(Project $project)
    {
        if(auth()->user()->id !== $project->user_id)
            abort(403);

        abort_if(auth()->user()->id !== $project->user_id, 403);
        return view('projects.show', compact('project'));
    }
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect('/projects' . '/' . $project->id);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
}
