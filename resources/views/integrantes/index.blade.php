@extends('layouts.app')
@section('titulo', 'Integrantes')
@section('contenido')
    <h1>Nuestro equipo</h1>
    <x-alerta>Conoce a los creadores de la plataforma</x-alerta>
    @if (session('mensaje'))
        <div style="color: green;">{{ session('mensaje') }}</div>
    @endif
    <p><a href="/integrantes/create">+ Registrar integrante</a></p>
    <ul>
        @forelse ($integrantes as $i)
            <li>{{ $i->nombre }}
                @if ($i->rol == 'Coordinador')
                    ★ Coordinador
                @endif
                - <a href="/integrantes/{{ $i->id }}/edit">Editar</a>
            </li>
        @empty
            <li>Aún no hay integrantes.</li>
        @endforelse
    </ul>
@endsection
