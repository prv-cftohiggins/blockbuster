<?php

use App\Models\Pelicula;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// El catálogo en JSON, para comprobar a simple vista que hay datos.
Route::get('/peliculas', function () {
    return Pelicula::with('genero')->orderBy('titulo')->get();
});
