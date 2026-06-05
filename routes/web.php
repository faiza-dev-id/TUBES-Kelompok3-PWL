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
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'nocache'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])
        ->name('dashboard');
        
    // Biodata (diisi setelah register)
Route::get('/biodata', [MahasiswaController::class, 'showBiodata'])
    ->name('mahasiswa.biodata');
Route::post('/biodata', [MahasiswaController::class, 'storeBiodata'])
    ->name('mahasiswa.storeBiodata');

    // Profil
    Route::get('/profil', [MahasiswaController::class, 'profile'])
        ->name('mahasiswa.profile');
    Route::put('/profil', [MahasiswaController::class, 'updateProfile'])
        ->name('mahasiswa.updateProfile');

    // CRUD Mahasiswa
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
