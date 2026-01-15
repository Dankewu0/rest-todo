<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        return response()->json($this->taskService->getAll());
    }

    public function show($id)
    {
        $task = $this->taskService->getById($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task);
    }

    public function store(TaskRequest $request)
    {
        $task = $this->taskService->create($request->validated());
        return response()->json($task, 201);
    }

    public function update(TaskRequest $request, $id)
    {
        $task = $this->taskService->getById($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        $task = $this->taskService->update($task, $request->validated());
        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = $this->taskService->getById($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        $this->taskService->delete($task);
        return response()->json(['message' => 'Task deleted']);
    }

}
