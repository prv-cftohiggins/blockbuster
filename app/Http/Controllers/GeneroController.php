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
}
