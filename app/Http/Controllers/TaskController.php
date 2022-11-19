<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\OwnerResource;
use App\Http\Resources\TaskResource;
use App\Models\Owner;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $owners = Owner::with('tasks')->get();
        // $tasks = Task::with('owners')->get();
        // $owners = OwnerResource::collection(Owner::get());
        // $owner = Owner::find(1);
        // dd($owners->tasks);

        // $tasks = Task::find(4);
        // $owners = Owner::find(6);
        // $tasks->owners()->sync([2]);
        // dd($tasks->owners);

        // $owners = Owner::all();
        // $owners->tasks()->sync([2]);
        // dd($owners->tasks);
        // foreach ($owners->tasks as $owner) {
        //     dd($owner->title);
        //     dd($owner->image);
        //     echo $owner->title;
        //     echo $owner->image;
        // }
        return Inertia::render('Tasks/Index', ['owners' => $owners]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::all();
        $tasks = Task::all();

        return Inertia::render('Tasks/Create', ['owners' => $owners, 'tasks' => $tasks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {

        // Task::create($request->validated());
        // $tasks = Task::all();

        // $tasks->owners()->attach();
        // $request->validate([
        //     'owner_id' => 'required|exists:owners,id',
        //     'task_id' => 'required|exists:tasks,id',

        // ]);

        $owner = Owner::find($request->owner_id);
        $owner->tasks()->attach($request->task_id);

        // return $request->all();

        return Redirect::route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        // $owners = Owner::with('tasks')->get();
        $owners = Owner::all();
        // $tasks = Task::all();

        return Inertia::render('Tasks/Edit', ['owners' => $owners, 'task' => $task->load('owners')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'owners' => 'required|array',
            'owners.*.id' => 'required|exists:owners,id',
            'title' => 'required',
            'image' => 'nullable|file'
        ]);

        // return $request->all();

        $task->update($request->only('title'));
        $task->owners()->sync(array_column($request->owners, 'id'));
        // return $request->all();
        return Redirect::route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        // return request()->all();
        $task = $task->owners()->detach(request('owner_id'));
        // dd($task);

        return Redirect::back();
    }
}
