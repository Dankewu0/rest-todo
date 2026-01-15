<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TasksController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->taskService->getAll());
    }

    public function store(TaskRequest $request): JsonResponse
    {
        $task = $this->taskService->create($request->validated());
        return response()->json($task, 201);
    }

    public function show(int $id): JsonResponse
    {
        $task = $this->taskService->getById($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task);
    }

    public function update(TaskRequest $request, int $id): JsonResponse
    {
        $task = $this->taskService->update($id, $request->validated());
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json($task);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->taskService->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        return response()->json(null, 204);
    }
}
