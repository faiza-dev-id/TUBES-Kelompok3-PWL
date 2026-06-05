<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing');
})->name('home');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Registrasi Biodata Mahasiswa
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Login & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'nocache'])->group(function () {

    // Lihat & edit profil sendiri
    Route::get('/profil', [MahasiswaController::class, 'profile'])
        ->name('mahasiswa.profile');

    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
        ->name('mahasiswa.index');

    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])
        ->name('mahasiswa.store');

    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])
        ->name('mahasiswa.show');

    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])
        ->name('mahasiswa.update');

    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])
        ->name('mahasiswa.destroy');
});