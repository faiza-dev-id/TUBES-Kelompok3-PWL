<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mitra\MitraDashboardController;
use App\Http\Controllers\Mitra\MitraLowonganController;
use App\Http\Controllers\Mitra\MitraPelamarController;
use App\Http\Controllers\Mitra\MitraLogController;
use App\Http\Controllers\Mitra\MitraPenilaianController;
use App\Http\Controllers\Mitra\MitraNilaiAkhirController;
use App\Http\Controllers\Mitra\MitraMahasiswaController; // FIX: tambah import

/*
|--------------------------------------------------------------------------
| Routes Portal Mitra
| Middleware: auth + mitra (cek role = 'mitra') + nocache
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'mitra', 'nocache'])->prefix('mitra')->name('mitra.')->group(function () {

    // ── Dashboard ──────────────────────────────────────────────────────
    Route::get('/dashboard', [MitraDashboardController::class, 'index'])
        ->name('dashboard');

    // ── Kelola Lowongan ────────────────────────────────────────────────
    Route::get('/lowongan',        [MitraLowonganController::class, 'index'])  ->name('lowongan.index');
    Route::post('/lowongan',       [MitraLowonganController::class, 'store'])  ->name('lowongan.store');
    Route::put('/lowongan/{id}',   [MitraLowonganController::class, 'update']) ->name('lowongan.update');
    Route::delete('/lowongan/{id}',[MitraLowonganController::class, 'destroy'])->name('lowongan.destroy');

    // ── Daftar Pelamar ─────────────────────────────────────────────────
    Route::get('/pelamar',              [MitraPelamarController::class, 'index'])  ->name('pelamar.index');
    Route::post('/pelamar/{id}/terima', [MitraPelamarController::class, 'terima']) ->name('pelamar.terima');
    Route::post('/pelamar/{id}/tolak',  [MitraPelamarController::class, 'tolak'])  ->name('pelamar.tolak');

    // ── Mahasiswa Magang (FIX: routes yang sebelumnya hilang) ──────────
    Route::get('/mahasiswa-magang',              [MitraMahasiswaController::class, 'index'])
        ->name('mahasiswa.index');
    Route::post('/mahasiswa-magang/{id}/hapus',  [MitraMahasiswaController::class, 'hapus'])
        ->name('mahasiswa.hapus');

    // ── Log Kegiatan Mahasiswa ─────────────────────────────────────────
    Route::get('/log-mahasiswa',              [MitraLogController::class, 'index'])   ->name('log.index');
    Route::post('/log-mahasiswa/{id}/setujui',[MitraLogController::class, 'setujui']) ->name('log.setujui');
    Route::post('/log-mahasiswa/{id}/tolak',  [MitraLogController::class, 'tolak'])   ->name('log.tolak');

    // ── Penilaian Mahasiswa ────────────────────────────────────────────
    Route::get('/penilaian',  [MitraPenilaianController::class, 'index']) ->name('penilaian.index');
    Route::post('/penilaian', [MitraPenilaianController::class, 'store']) ->name('penilaian.store');

    // ── Nilai Akhir ────────────────────────────────────────────────────
    Route::get('/nilai-akhir', [MitraNilaiAkhirController::class, 'index'])->name('nilai-akhir.index');

});