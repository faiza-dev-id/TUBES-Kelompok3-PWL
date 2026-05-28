<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\MitraController;

Route::get('/', function () {
    return view('welcome');
});
