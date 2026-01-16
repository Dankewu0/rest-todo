<?php

namespace App\Services;

use App\Models\Task;
use App\Enums\TaskStatus;

class TaskService
{
    public function create(array $data): Task
    {
        return Task::create([
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'status'      => TaskStatus::from($data['status']),
        ]);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Task::all();
    }

    public function getById(int $id): ?Task
    {
        return Task::find($id);
    }

    public function update(int $id, array $data): ?Task
    {
        $task = Task::find($id);
        if (!$task) {
            return null;
        }

        if (array_key_exists('title', $data)) {
            $task->title = $data['title'];
        }

        if (array_key_exists('description', $data)) {
            $task->description = $data['description'];
        }

        if (array_key_exists('status', $data)) {
            $task->status = TaskStatus::from($data['status']);
        }

        $task->save();

        return $task;
    }

    public function delete(int $id): bool
    {
        $task = Task::find($id);
        if (!$task) {
            return false;
        }

        return $task->delete();
    }
}
