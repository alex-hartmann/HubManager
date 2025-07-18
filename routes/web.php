<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use Inertia\Middleware;
use App\Http\Middleware\CheckUserAccess;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::post('/login', [UserController::class, 'login'])
    ->name('login');

Route::middleware([CheckUserAccess::class])->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/habits', [App\Http\Controllers\HabitsController::class, 'index'])
        ->name('habits.index');
    Route::post('/habits', [App\Http\Controllers\HabitsController::class, 'store'])
        ->name('habits.store');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
        ->name('dashboard');
    Route::put('/habits/{habit}/progress', [App\Http\Controllers\HabitsController::class, 'updateHabit'])
        ->name('habits.update');
    Route::delete('/habits/destroy/{id}', [App\Http\Controllers\HabitsController::class, 'destroy'])
        ->name('habits.destroy');
    Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'update'])
        ->name('tasks.update');
    Route::put('/tasks/{task}/status', [App\Http\Controllers\TaskController::class, 'updateStatus'])
        ->name('tasks.updateStatus');
    Route::put('/tasks/{task}/reopen', [App\Http\Controllers\TaskController::class, 'reopen'])
        ->name('tasks.reopen');
    Route::delete('/tasks/destroy/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])
        ->name('tasks.destroy');
    Route::get('/finances', [App\Http\Controllers\FinancesController::class, 'index'])
        ->name('finances.index');
});


Route::get('login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
