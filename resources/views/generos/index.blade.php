@extends('layouts.app')

@section('titulo', 'Géneros')

@section('contenido')
    <table>
        <thead>
            <tr>
                <th>Género</th>
                <th>Descripción</th>
                <th>Películas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($generos as $genero)
                <tr>
                    <td><a href="{{ route('generos.show', $genero) }}">{{ $genero->nombre }}</a></td>
                    <td>{{ $genero->descripcion }}</td>
                    <td>{{ $genero->peliculas_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay géneros cargados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
