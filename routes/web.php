<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// ── Dashboard (hanya bisa diakses setelah login) ───────────────────────────
Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'nocache'])
    ->name('dashboard');

// ── Auth ───────────────────────────────────────────────────────────────────
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');