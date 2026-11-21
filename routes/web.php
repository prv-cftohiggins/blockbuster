<?php

use App\Http\Controllers\SocioController;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// El catálogo en JSON, para comprobar a simple vista que hay datos.
Route::get('/peliculas', function () {
    return Pelicula::with(['genero', 'clasificacion', 'copias'])->orderBy('titulo')->get();
});

Route::get('/socios', [SocioController::class, 'index'])->name('socios.index');
