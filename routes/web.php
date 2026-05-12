<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LowonganController;

Route::resource('lowongan', LowonganController::class);