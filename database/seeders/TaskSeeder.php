<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::create([
            'title' => 'Complete Laravel Project',
            'description' => 'Finish the task manager application',
            'status' => 'in_progress',
        ]);

        Task::create([
            'title' => 'Learn Vue.js',
            'description' => 'Study Vue.js fundamentals',
            'status' => 'pending',
        ]);

        Task::create([
            'title' => 'Write Tests',
            'description' => 'Add unit and feature tests to the project',
            'status' => 'pending',
        ]);
    }
}