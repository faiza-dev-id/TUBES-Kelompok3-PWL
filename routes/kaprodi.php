<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kaprodi\KaprodiDashboardController;
use App\Http\Controllers\Kaprodi\KaprodiMahasiswaController;

Route::middleware(['auth', 'kaprodi', 'nocache'])->prefix('kaprodi')->name('kaprodi.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [KaprodiDashboardController::class, 'index'])
        ->name('dashboard');

    // ✅ rekap-nilai HARUS di atas /{user} agar tidak tertangkap sebagai parameter
    Route::get('/mahasiswa/rekap-nilai', [KaprodiMahasiswaController::class, 'rekapNilai'])
        ->name('mahasiswa.rekap');

    Route::get('/mahasiswa', [KaprodiMahasiswaController::class, 'index'])
        ->name('mahasiswa.index');

    Route::get('/mahasiswa/{user}', [KaprodiMahasiswaController::class, 'show'])
        ->name('mahasiswa.show');

});