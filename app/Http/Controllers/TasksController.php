<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TasksController extends Controller
{
    public function __construct(private TaskService $service) {}

    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->service->getById($id));
    }

    public function store(TaskRequest $request): JsonResponse
    {
        return response()->json($this->service->create($request->validated()));
    }

    public function update(TaskRequest $request, int $id): JsonResponse
    {
        return response()->json($this->service->update($id, $request->validated()));
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json(['deleted' => $this->service->delete($id)]);
    }
}
