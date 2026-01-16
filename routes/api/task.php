<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::prefix('tasks')->group(function () {
    Route::get('/', [TasksController::class, 'index']);
    Route::post('/', [TasksController::class, 'store']);
    Route::get('{id}', [TasksController::class, 'show']);
    Route::put('{id}', [TasksController::class, 'update']);
    Route::delete('{id}', [TasksController::class, 'destroy']);
});
