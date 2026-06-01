<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LowonganBrowseController;
use App\Http\Controllers\LamaranMahasiswaController;
use App\Http\Controllers\LogKegiatanController;
use App\Http\Controllers\LaporanKegiatanController;
use App\Http\Controllers\PenilaianController;

/*
|--------------------------------------------------------------------------
| Redirect root ke login
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes (tanpa middleware)
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Routes Mahasiswa (harus login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'nocache'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Lowongan Magang (Browse)
    Route::get('/lowongan', [LowonganBrowseController::class, 'index'])
        ->name('lowongan.browse');
    Route::get('/lowongan/{id}', [LowonganBrowseController::class, 'show'])
        ->name('lowongan.show');

    // Lamaran Saya
    Route::get('/lamaran', [LamaranMahasiswaController::class, 'index'])
        ->name('lamaran.saya');
    Route::post('/lamaran', [LamaranMahasiswaController::class, 'store'])
        ->name('lamaran.store');
    Route::delete('/lamaran/{id}', [LamaranMahasiswaController::class, 'destroy'])
        ->name('lamaran.destroy');

    // Log Kegiatan
    Route::get('/log-kegiatan', [LogKegiatanController::class, 'index'])
        ->name('log-kegiatan.index');
    Route::post('/log-kegiatan', [LogKegiatanController::class, 'store'])
        ->name('log-kegiatan.store');
    Route::put('/log-kegiatan/{id}', [LogKegiatanController::class, 'update'])
        ->name('log-kegiatan.update');
    Route::delete('/log-kegiatan/{id}', [LogKegiatanController::class, 'destroy'])
        ->name('log-kegiatan.destroy');

    // Laporan Kegiatan
    Route::get('/laporan-kegiatan', [LaporanKegiatanController::class, 'index'])
        ->name('laporan-kegiatan.index');
    Route::post('/laporan-kegiatan', [LaporanKegiatanController::class, 'store'])
        ->name('laporan-kegiatan.store');
    Route::get('/laporan-kegiatan/{id}/download', [LaporanKegiatanController::class, 'download'])
        ->name('laporan-kegiatan.download');
    Route::delete('/laporan-kegiatan/{id}', [LaporanKegiatanController::class, 'destroy'])
        ->name('laporan-kegiatan.destroy');

    // Hasil Penilaian
    Route::get('/penilaian', [PenilaianController::class, 'index'])
        ->name('penilaian.index');

});

/*
|--------------------------------------------------------------------------
| Routes Portal Mitra
|--------------------------------------------------------------------------
*/
require __DIR__ . '/mitra.php';