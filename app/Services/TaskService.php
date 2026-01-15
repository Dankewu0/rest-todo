<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function getAll()
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

        $task->update($data);
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
