@extends('layouts.app')

@section('titulo', 'Socios')

@section('contenido')
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RUT</th>
                <th>Edad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($socios as $socio)
                <tr>
                    <td>{{ $socio->nombre }}</td>
                    <td>{{ $socio->rutFormateado() }}</td>
                    <td>{{ $socio->edad() }} años</td>
                    <td>
                        {{-- <mark> resalta a los suspendidos para que se vean a simple vista. --}}
                        @if ($socio->estaActivo())
                            Activo
                        @else
                            <mark>Suspendido</mark>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay socios cargados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
