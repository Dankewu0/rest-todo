<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::post('/tasks', [TasksController::class, 'store']);
Route::get('/tasks', [TasksController::class, 'index']);
Route::get('/tasks/{id}', [TasksController::class, 'show']);
Route::put('/tasks/{id}', [TasksController::class, 'update']);
Route::delete('/tasks/{id}', [TasksController::class, 'destroy']);
