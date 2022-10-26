<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

use function Termwind\render;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = ProjectResource::collection(Project::with('skill')->get());
        return Inertia::render('Projects/Index', ['projects' => $projects]);
    }

    public function create()
    {
        $skills = Skill::all();
        return Inertia::render('Projects/Create', ['skills' => $skills]);
    }

    public function store(StoreProjectRequest $request)
    {
        // $request->validate([
        //     'name' => ['required', 'min:3'],
        //     'image' => ['required', 'image'],
        //     'skill_id' => ['required']
        // ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('projects', ['disk' => 'public']);
            Project::create(array_merge($request->only('name', 'skill_id'), ['image' => $image]));
            return Redirect::route('projects.index');
        }
        return Redirect::back();
    }

    public function edit(Project $project)
    {
        $skills = Skill::all();
        return Inertia::render('Projects/Edit', ['project' => $project, 'skills' => $skills]);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $image = $project->image;

        if ($request->hasFile('image')) {
            Storage::delete($project->image);
            $image = $request->file('image')->store('projects', ['disk' => 'public']);
        }
        $project->update(array_merge($request->only('name', 'skill_id'), ['image' => $image]));
        return Redirect::route('projects.index');
    }

    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();
        return Redirect::back();
    }
}
