<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LamaranController;


Route::middleware('auth:sanctum')->group(function () {

    // Melamar lowongan magang
    Route::post('/lamaran', [LamaranController::class, 'store']);

    // Melihat semua riwayat lamaran milik mahasiswa yg login
    Route::get('/lamaran/saya', [LamaranController::class, 'riwayatSaya']);

    // Melihat detail satu lamaran milik mahasiswa yg login
    Route::get('/lamaran/{id}', [LamaranController::class, 'show']);

    // Membatalkan lamaran (hanya jika masih pending)
    Route::delete('/lamaran/{id}', [LamaranController::class, 'destroy']);

    // Melihat semua pelamar pada lowongan milik mitra
    // Optional query: ?lowongan_id=1 dan ?status=pending
    Route::get('/mitra/lamaran', [LamaranController::class, 'daftarPelamar']);

    // Menerima pelamar
    Route::patch('/mitra/lamaran/{id}/terima', [LamaranController::class, 'terima']);

    // Menolak pelamar
    Route::patch('/mitra/lamaran/{id}/tolak', [LamaranController::class, 'tolak']);

});

require __DIR__.'/apilamaran.php';