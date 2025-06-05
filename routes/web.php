<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use Inertia\Middleware;
use App\Http\Middleware\CheckUserAccess;

Route::get('/', function () {
    return Inertia::render('Welcome', [
    ]);
});

Route::post('/login', [UserController::class, 'login'])
    ->name('login');

Route::middleware([CheckUserAccess::class])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
        ->name('dashboard');
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/register', [UserController::class, 'create'])
        ->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
});
Route::get('login', function () {
    return Inertia::render('Auth/Login');
})->name('login');