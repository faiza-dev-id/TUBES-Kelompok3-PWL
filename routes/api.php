<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\LogMagangController;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API berhasil jalan'
    ]);
});

// Mahasiswa
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('mahasiswa', MahasiswaController::class);
    Route::get('/mahasiswa-profile', [MahasiswaController::class, 'profile']);
});

// Lowongan
Route::apiResource('lowongan', LowonganController::class);

// Lamaran
Route::apiResource('lamaran', LamaranController::class);

// Log Magang Mahasiswa
Route::middleware(['auth:sanctum', 'role:mahasiswa'])->group(function () {
    Route::get('/log-magang', [LogMagangController::class, 'index']);
    Route::post('/log-magang', [LogMagangController::class, 'store']);
    Route::get('/log-magang/{id}', [LogMagangController::class, 'show']);
    Route::put('/log-magang/{id}', [LogMagangController::class, 'update']);
    Route::delete('/log-magang/{id}', [LogMagangController::class, 'destroy']);
});

// Mitra melihat log magang mahasiswa
Route::middleware(['auth:sanctum', 'role:mitra'])->group(function () {
    Route::get('/mitra/log-magang', [LogMagangController::class, 'indexMitra']);
});
