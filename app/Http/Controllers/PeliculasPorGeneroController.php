<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\View\View;

class PeliculasPorGeneroController extends Controller
{
    /**
     * Muestra las películas agrupadas por género.
     * Si llega un género, muestra solo las películas de ese género.
     */
    public function __invoke(?Genero $genero = null): View
    {
        $generos = Genero::withCount('peliculas')->orderBy('nombre')->get();

        $seleccionados = $genero
            ? collect([$genero])
            : $generos->where('peliculas_count', '>', 0)->values();

        $seleccionados->each->load([
            'peliculas' => fn ($query) => $query->with('clasificacion')->orderBy('titulo'),
        ]);

        return view('peliculas.por-genero', [
            'generos' => $generos,
            'seleccionados' => $seleccionados,
            'generoActual' => $genero,
        ]);
    }
}
