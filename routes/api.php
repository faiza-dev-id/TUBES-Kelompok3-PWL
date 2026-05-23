<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\LogMagangController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {
    return response()->json([
        'message' => 'API berhasil jalan'
    ]);
});

// Mahasiswa
Route::apiResource('mahasiswa', MahasiswaController::class);

// Lowongan
Route::apiResource('lowongan', LowonganController::class);

// Lamaran
Route::apiResource('lamaran', LamaranController::class);

// Log Magang
Route::apiResource('log-magang', LogMagangController::class);
