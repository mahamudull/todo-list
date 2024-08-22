<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index']);
Route::post('/add-task', [TaskController::class, 'addTask']);
Route::post('/toggle-complete/{id}', [TaskController::class, 'toggleComplete']);
Route::post('/delete-task/{id}', [TaskController::class, 'deleteTask']);
Route::get('/edit-task/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/update-task/{id}', [TaskController::class, 'update'])->name('tasks.update');
