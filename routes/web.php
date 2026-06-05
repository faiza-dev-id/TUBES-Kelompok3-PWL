<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;

// Halaman utama → redirect ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// ── Auth (tanpa login) ──
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ── Mahasiswa (butuh login) ──
Route::middleware('auth')->group(function () {
    Route::get('/profil',             [MahasiswaController::class, 'profile'])->name('mahasiswa.profile');
    Route::get('/mahasiswa',          [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::post('/mahasiswa',         [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{id}',     [MahasiswaController::class, 'show'])->name('mahasiswa.show');
    Route::put('/mahasiswa/{id}',     [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}',  [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});
