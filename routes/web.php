<?php

use App\Http\Controllers\GeneroController;
use App\Http\Controllers\SocioController;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generos', [GeneroController::class, 'index'])->name('generos.index');

// El catálogo en JSON, para comprobar a simple vista que hay datos.
Route::get('/peliculas', function () {
    return Pelicula::with(['genero', 'clasificacion', 'copias'])->orderBy('titulo')->get();
});

Route::get('/socios', [SocioController::class, 'index'])->name('socios.index');
Route::get('/socios/{socio}', [SocioController::class, 'show'])->name('socios.show');
