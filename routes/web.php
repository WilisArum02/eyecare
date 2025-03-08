<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoMataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [FotoMataController::class, 'getFoto']);