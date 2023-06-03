<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()->count(10)->create();
        $tasks = Task::get();
        foreach ($tasks as $index => $task) {
            $task->priority = $index;
            $task->save();
        }
    }
}
