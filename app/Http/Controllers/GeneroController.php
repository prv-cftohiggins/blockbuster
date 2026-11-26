<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\View\View;

class GeneroController extends Controller
{
    /**
     * Lista de géneros, cada uno con cuántas películas tiene.
     */
    public function index(): View
    {
        $generos = Genero::withCount('peliculas')->orderBy('nombre')->get();

        return view('generos.index', ['generos' => $generos]);
    }

    /**
     * Un género con sus películas, ordenadas por título.
     * Laravel busca el género por su id (enlace de modelos) y responde 404 si no existe.
     */
    public function show(Genero $genero): View
    {
        $genero->load([
            'peliculas' => fn ($consulta) => $consulta->with('clasificacion')->orderBy('titulo'),
        ]);

        return view('generos.show', ['genero' => $genero]);
    }
}
