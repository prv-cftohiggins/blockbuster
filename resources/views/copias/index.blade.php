@extends('layouts.app')

@section('titulo', 'Copias')

@section('contenido')
    <form method="get" action="{{ route('copias.index') }}">
        <div class="grid">
            <label>
                Película
                <select name="pelicula">
                    <option value="">Todas</option>
                    @foreach ($peliculas as $pelicula)
                        <option value="{{ $pelicula->id }}" @selected(($filtros['pelicula'] ?? '') == $pelicula->id)>{{ $pelicula->titulo }}</option>
                    @endforeach
                </select>
            </label>

            <label>
                Formato
                <select name="formato">
                    <option value="">Todos</option>
                    @foreach ($formatos as $formato)
                        <option value="{{ $formato }}" @selected(($filtros['formato'] ?? '') === $formato)>{{ $formato }}</option>
                    @endforeach
                </select>
            </label>

            <label>
                Estado
                <select name="estado">
                    <option value="">Todos</option>
                    @foreach ($estados as $valor => $texto)
                        <option value="{{ $valor }}" @selected(($filtros['estado'] ?? '') === $valor)>{{ $texto }}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <button type="submit">Filtrar</button>
        <a href="{{ route('copias.index') }}">Quitar filtros</a>
    </form>

    <p>{{ $copias->count() }} {{ $copias->count() === 1 ? 'copia encontrada' : 'copias encontradas' }}</p>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Película</th>
                <th>Formato</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($copias as $copia)
                <tr>
                    <td>{{ $copia->codigo }}</td>
                    <td>{{ $copia->pelicula?->titulo ?? 'Película eliminada' }}</td>
                    <td>{{ $copia->formato }}</td>
                    <td>{{ $estados[$copia->estado] ?? $copia->estado }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay copias con esos filtros.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
