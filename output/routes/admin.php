<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminMitraController;
use App\Http\Controllers\Admin\AdminLamaranController;

/*
|--------------------------------------------------------------------------
| Routes Portal Admin
| Middleware: auth + admin (cek role = 'admin') + nocache
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin', 'nocache'])->prefix('admin')->name('admin.')->group(function () {

    // ── Dashboard ──────────────────────────────────────────────────────
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    // ── Manajemen User ─────────────────────────────────────────────────
    Route::get('/users',           [AdminUserController::class, 'index'])  ->name('users.index');
    Route::get('/users/create',    [AdminUserController::class, 'create']) ->name('users.create');
    Route::post('/users',          [AdminUserController::class, 'store'])  ->name('users.store');
    Route::get('/users/{user}/edit',   [AdminUserController::class, 'edit'])   ->name('users.edit');
    Route::put('/users/{user}',        [AdminUserController::class, 'update']) ->name('users.update');
    Route::delete('/users/{user}',     [AdminUserController::class, 'destroy'])->name('users.destroy');

    // ── Manajemen Mitra ────────────────────────────────────────────────
    Route::get('/mitra',               [AdminMitraController::class, 'index'])  ->name('mitra.index');
    Route::get('/mitra/create',        [AdminMitraController::class, 'create']) ->name('mitra.create');
    Route::post('/mitra',              [AdminMitraController::class, 'store'])  ->name('mitra.store');
    Route::get('/mitra/{mitra}/edit',  [AdminMitraController::class, 'edit'])   ->name('mitra.edit');
    Route::put('/mitra/{mitra}',       [AdminMitraController::class, 'update']) ->name('mitra.update');
    Route::delete('/mitra/{mitra}',    [AdminMitraController::class, 'destroy'])->name('mitra.destroy');

    // ── Monitor Lamaran ────────────────────────────────────────────────
    Route::get('/lamaran',             [AdminLamaranController::class, 'index']) ->name('lamaran.index');
    Route::get('/lamaran/{lamaran}',   [AdminLamaranController::class, 'show'])  ->name('lamaran.show');

});
