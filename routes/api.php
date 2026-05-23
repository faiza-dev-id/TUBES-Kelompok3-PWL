<?php

use App\Http\Controllers\LogMagangController;
use Illuminate\Support\Facades\Route;

// Mahasiswa: kelola log magang sendiri
Route::middleware(['auth:sanctum', 'role:mahasiswa'])->group(function () {
    Route::get('/log-magang',         [LogMagangController::class, 'index']);
    Route::post('/log-magang',        [LogMagangController::class, 'store']);
    Route::get('/log-magang/{id}',    [LogMagangController::class, 'show']);
    Route::put('/log-magang/{id}',    [LogMagangController::class, 'update']);
    Route::delete('/log-magang/{id}', [LogMagangController::class, 'destroy']);
});

// Mitra: monitor aktivitas mahasiswa
Route::middleware(['auth:sanctum', 'role:mitra'])->group(function () {
    Route::get('/mitra/log-magang', [LogMagangController::class, 'indexMitra']);
});
