<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kaprodi\KaprodiDashboardController;
use App\Http\Controllers\Kaprodi\KaprodiMahasiswaController;

/*
|--------------------------------------------------------------------------
| Routes Portal Kaprodi / Sekprodi
| Middleware: auth + kaprodi (cek role = 'kaprodi' atau 'sekprodi') + nocache
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'kaprodi', 'nocache'])->prefix('kaprodi')->name('kaprodi.')->group(function () {

    // ── Dashboard ──────────────────────────────────────────────────────
    Route::get('/dashboard', [KaprodiDashboardController::class, 'index'])
        ->name('dashboard');

    // ── Monitoring Mahasiswa ───────────────────────────────────────────
    Route::get('/mahasiswa',                    [KaprodiMahasiswaController::class, 'index'])      ->name('mahasiswa.index');
    Route::get('/mahasiswa/{user}',             [KaprodiMahasiswaController::class, 'show'])       ->name('mahasiswa.show');
    Route::get('/mahasiswa/rekap-nilai',        [KaprodiMahasiswaController::class, 'rekapNilai']) ->name('mahasiswa.rekap');

});
