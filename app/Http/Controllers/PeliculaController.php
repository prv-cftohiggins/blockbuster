<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\View\View;

class PeliculaController extends Controller
{
    /**
     * Catálogo ordenado por título, con su género y su clasificación.
     */
    public function index(): View
    {
        $peliculas = Pelicula::with(['genero', 'clasificacion'])->orderBy('titulo')->get();

        return view('peliculas.index', ['peliculas' => $peliculas]);
    }
}
