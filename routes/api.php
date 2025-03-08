<?php

use App\Http\Controllers\FotoMataController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\RekomendasiController;
use Illuminate\Support\Facades\Route;

Route::post('/upload', [FotoMataController::class, 'uploadFoto']);
Route::get('/klasifikasi/{id}', [KlasifikasiController::class, 'getHasil']);
Route::get('/rekomendasi/{id}', [RekomendasiController::class, 'getRekomendasi']);