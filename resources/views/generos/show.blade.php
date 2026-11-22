@extends('layouts.app')

@section('titulo', $genero->nombre)

@section('contenido')
    <p>{{ $genero->descripcion }}</p>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Año</th>
                <th>Clasificación</th>
                <th>Duración</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genero->peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->anio }}</td>
                    <td>{{ $pelicula->clasificacion?->codigo ?? 'Sin clasificar' }}</td>
                    <td>{{ $pelicula->duracion }} min</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Este género todavía no tiene películas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p><a href="{{ route('generos.index') }}">← Volver a géneros</a></p>
@endsection
