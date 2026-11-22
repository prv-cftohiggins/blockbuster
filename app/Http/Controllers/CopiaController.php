<?php

namespace App\Http\Controllers;

use App\Models\Copia;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CopiaController extends Controller
{
    /**
     * Copias del videoclub, con filtros opcionales por película, formato y estado.
     */
    public function index(Request $request): View
    {
        $copias = Copia::with('pelicula')
            ->when($request->query('pelicula'), fn ($consulta, $pelicula) => $consulta->where('pelicula_id', $pelicula))
            ->when($request->query('formato'), fn ($consulta, $formato) => $consulta->where('formato', $formato))
            ->when($request->query('estado'), fn ($consulta, $estado) => $consulta->where('estado', $estado))
            ->orderBy('codigo')
            ->get();

        return view('copias.index', [
            'copias' => $copias,
            'peliculas' => Pelicula::orderBy('titulo')->get(['id', 'titulo']),
            'formatos' => Copia::FORMATOS,
            'estados' => Copia::ESTADOS,
            'filtros' => $request->only(['pelicula', 'formato', 'estado']),
        ]);
    }
}
