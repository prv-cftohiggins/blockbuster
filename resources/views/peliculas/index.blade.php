@extends('layouts.app')

@section('titulo', 'Películas')

@section('contenido')
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Año</th>
                <th>Género</th>
                <th>Clasificación</th>
                <th>Duración</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->anio }}</td>
                    <td>{{ $pelicula->genero?->nombre ?? 'Sin género' }}</td>
                    <td>{{ $pelicula->clasificacion?->codigo ?? 'Sin clasificar' }}</td>
                    <td>{{ $pelicula->duracion }} min</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay películas cargadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
