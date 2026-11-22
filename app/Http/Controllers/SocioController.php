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
}
