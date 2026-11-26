<?php

use App\Http\Controllers\GeneroController;
use App\Models\Pelicula;
use App\Models\Socio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generos', [GeneroController::class, 'index'])->name('generos.index');
Route::get('/generos/{genero}', [GeneroController::class, 'show'])->name('generos.show');

// El catálogo en JSON, para comprobar a simple vista que hay datos.
Route::get('/peliculas', function () {
    return Pelicula::with(['genero', 'clasificacion', 'copias'])->orderBy('titulo')->get();
});

Route::get('/socios', function () {
    return Socio::orderBy('nombre')->get();
});
