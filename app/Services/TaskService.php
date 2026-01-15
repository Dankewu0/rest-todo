<?php

namespace App\Services;

use App\Models\tasks;

class TaskService
{
    public function create(array $data): tasks
    {
        return tasks::create($data);
    }

    public function getAll()
    {
        return tasks::all();
    }

    public function getById(int $id): ?tasks
    {
        return tasks::find($id);
    }

    public function update(tasks $task, array $data): tasks
    {
        $task->update($data);
        return $task;
    }

    public function delete(tasks $task): bool
    {
        return $task->delete();
    }
}
