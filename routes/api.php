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

// Mahasiswa (protected)
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('mahasiswa', MahasiswaController::class);
    Route::get('/mahasiswa-profile', [MahasiswaController::class, 'profile']);
});

// Lowongan
Route::apiResource('lowongan', LowonganController::class);

// Lamaran
Route::apiResource('lamaran', LamaranController::class);

// Log Magang
Route::apiResource('log-magang', LogMagangController::class);
