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

    /**
     * Todos los datos de una película, con cuántas copias tiene y cuántas están disponibles.
     * Laravel busca la película por su id (enlace de modelos) y responde 404 si no existe.
     */
    public function show(Pelicula $pelicula): View
    {
        $pelicula->load(['genero', 'clasificacion'])->loadCount([
            'copias',
            'copias as copias_disponibles_count' => fn ($consulta) => $consulta->where('estado', 'disponible'),
        ]);

        return view('peliculas.show', ['pelicula' => $pelicula]);
    }
}
