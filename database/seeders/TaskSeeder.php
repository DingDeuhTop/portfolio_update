<?php

namespace Database\Seeders;

use App\Models\Owner;
use App\Models\Task;
use Database\Factories\TaskFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::factory(4)->create();

        foreach (Task::all() as $task) {
            $owners = Owner::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $task->owners()->attach($owners);
        }
    }
}
