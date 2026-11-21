<?php

use App\Http\Controllers\GeneroController;
use App\Http\Controllers\PeliculaController;
use App\Models\Socio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generos', [GeneroController::class, 'index'])->name('generos.index');

Route::get('/socios', function () {
    return Socio::orderBy('nombre')->get();
});

Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');
