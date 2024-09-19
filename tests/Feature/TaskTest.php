<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_tasks()
    {
        Task::factory()->count(3)->create();

        $response = $this->get('/tasks');

        $response->assertStatus(200);
        $response->assertViewHas('tasks', function ($tasks) {
            return $tasks->count() === 3;
        });
    }

    public function test_can_create_task()
    {
        $taskData = [
            'title' => 'New Task',
            'description' => 'This is a new task',
            'status' => 'pending',
        ];

        $response = $this->post('/tasks', $taskData);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function test_can_update_task()
    {
        $task = Task::factory()->create();
        $updatedData = [
            'title' => 'Updated Task',
            'description' => 'This task has been updated',
            'status' => 'completed',
        ];

        $response = $this->put("/tasks/{$task->id}", $updatedData);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', $updatedData);
    }

    public function test_can_delete_task()
    {
        $task = Task::factory()->create();

        $response = $this->delete("/tasks/{$task->id}");

        $response->assertRedirect('/tasks');
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}