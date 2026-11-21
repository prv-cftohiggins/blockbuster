<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\View\View;

class SocioController extends Controller
{
    // Muestra la lista de todos los socios, ordenados por nombre.
    public function index(): View
    {
        $socios = Socio::orderBy('nombre')->get();

        return view('socios.index', ['socios' => $socios]);
    }

    // Muestra todos los datos de un socio. Laravel busca el socio por su id
    // (enlace de modelos) y responde 404 si no existe.
    public function show(Socio $socio): View
    {
        return view('socios.show', ['socio' => $socio]);
    }
}
