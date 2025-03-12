<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


// Resource route for tasks
Route::resource('tasks', TaskController::class);

// Additional custom routes
Route::put('/tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/tasks/finish-all', [TaskController::class, 'markAllAsDone'])->name('tasks.markAllAsDone');
Route::put('/tasks/{task}/toggle', [TaskController::class, 'toggleCompletion'])->name('tasks.toggleCompletion');
