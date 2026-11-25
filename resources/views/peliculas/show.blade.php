@extends('layouts.app')

@section('titulo', $pelicula->titulo)

@section('contenido')
    <dl>
        <dt>Año</dt>
        <dd>{{ $pelicula->anio }}</dd>

        <dt>Director</dt>
        <dd>{{ $pelicula->director }}</dd>

        <dt>Reparto</dt>
        <dd>{{ $pelicula->reparto }}</dd>

        <dt>Duración</dt>
        <dd>{{ $pelicula->duracion }} min</dd>

        <dt>Género</dt>
        <dd>{{ $pelicula->genero?->nombre ?? 'Sin género' }}</dd>

        <dt>Clasificación</dt>
        <dd>
            @if ($pelicula->clasificacion)
                {{ $pelicula->clasificacion->codigo }} · {{ $pelicula->clasificacion->nombre }}
            @else
                Sin clasificar
            @endif
        </dd>

        <dt>Sinopsis</dt>
        <dd>{{ $pelicula->sinopsis }}</dd>

        <dt>Copias</dt>
        <dd>
            @if ($pelicula->copias_count === 0)
                Sin copias.
            @else
                {{-- Singular o plural según la cantidad: "1 disponible", "2 disponibles". --}}
                {{ $pelicula->copias_count }} en total,
                {{ $pelicula->copias_disponibles_count }} {{ $pelicula->copias_disponibles_count === 1 ? 'disponible' : 'disponibles' }}.
                <a href="{{ url('/copias?pelicula=' . $pelicula->id) }}">Ver sus copias</a>
            @endif
        </dd>
    </dl>

    <p><a href="{{ route('peliculas.index') }}">← Volver a películas</a></p>
@endsection
