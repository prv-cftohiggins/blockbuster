<?php

use App\Models\Pelicula;
use App\Models\Socio;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculasPorGeneroController;

Route::get('/', function () {
    return view('welcome');
});

// El catálogo en JSON, para comprobar a simple vista que hay datos.
Route::get('/peliculas', function () {
    return Pelicula::with(['genero', 'clasificacion', 'copias'])->orderBy('titulo')->get();
});

Route::get('/socios', function () {
    return Socio::orderBy('nombre')->get();
});
// Pantalla: películas agrupadas por género (o de un solo género).
Route::get('/generos/{genero?}', PeliculasPorGeneroController::class)->name('peliculas.por-genero');
