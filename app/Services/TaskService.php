<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function create(array $data): Task
    {
        return Task::create([
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'status'      => $data['status'],
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

        $task->update([
            'title'       => $data['title'] ?? $task->title,
            'description' => $data['description'] ?? $task->description,
            'status'      => $data['status'] ?? $task->status,
        ]);

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
