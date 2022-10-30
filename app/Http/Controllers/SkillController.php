<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Services\Master\SkillService;

class SkillController extends Controller
{
    public function index()
    {
        $skills = SkillResource::collection(Skill::all());
        return Inertia::render('Skills/Index', ['skills' => $skills]);
    }

    public function create()
    {
        return Inertia::render('Skills/Create');
    }

    public function store(StoreSkillRequest $request)
    {
        // $request->validate([
        //     'image' => ['required', 'image'],
        //     'name' => ['required', 'min:3 ']
        // ]);
        $skill_service = new SkillService;

        if ($request->hasFile('image')) {
            $image = $skill_service->upload_image($request);
            Skill::create(array_merge($request->only('name'), ['image' => $image]));
            return Redirect::route('skills.index')->with('message', 'Skill Created Successfully');
        }
        return Redirect::back()->with('message', 'Created Successfully');
    }

    public function show(Skill $skill)
    {
        return SkillResource::make($skill);
    }

    public function edit(Skill $skill)
    {
        return Inertia::render('Skills/Edit', ['skill' => $skill]);
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $image = $skill->image;

        $skill_service = new SkillService;
        // $request->validate([
        //     'name' => ['required', 'min:3']
        // ]);

        if ($request->hasFile('image')) {
            Storage::delete($skill->image);
            $image = $skill_service->upload_image($request);
        }
        $skill->update(array_merge($request->only('name'), ['image' => $image]));

        return Redirect::route('skills.index');
    }

    public function destroy(Skill $skill)
    {
        Storage::delete($skill->image);
        $skill->delete();
        return Redirect::back();
    }
}
