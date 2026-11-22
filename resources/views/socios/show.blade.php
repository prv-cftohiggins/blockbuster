@extends('layouts.app')

@section('titulo', $socio->nombre)

@section('contenido')
    <dl>
        <dt>RUT</dt>
        <dd>{{ $socio->rutFormateado() }}</dd>

        <dt>Email</dt>
        <dd>{{ $socio->email }}</dd>

        <dt>Teléfono</dt>
        <dd>{{ $socio->telefono ?? 'Sin teléfono' }}</dd>

        <dt>Fecha de nacimiento</dt>
        {{-- fecha_nacimiento llega como Carbon gracias a casts(), por eso tiene format(). --}}
        <dd>{{ $socio->fecha_nacimiento->format('d/m/Y') }} ({{ $socio->edad() }} años)</dd>

        <dt>Estado</dt>
        <dd>
            @if ($socio->estaActivo())
                Activo
            @else
                <mark>Suspendido</mark>
            @endif
        </dd>
    </dl>

    <p><a href="{{ route('socios.index') }}">← Volver a socios</a></p>
@endsection
