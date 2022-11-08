<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Owner;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Skill::factory(3)->create();
        Project::factory(3)->create();
        Owner::factory(3)->create();
        // Task::factory(3)->create();


        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([TaskSeeder::class]);

        //for owner&task other way many to many database seeder
        // Owner::factory(3)->create();

        // $tasks = ['title', 'image'];

        // foreach ($tasks as $task) {
        //     Task::create(['title' => $task]);
        // }

        // foreach (Owner::all() as $owner) {
        //     foreach (Task::all() as $task) {
        //         $owner->tasks()->attach($task->id);
        //     }
        // }
    }
}
