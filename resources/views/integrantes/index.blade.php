@extends('layouts.app')
@section('titulo', 'Integrantes')
@section('contenido')
    <h1>Nuestro equipo</h1>
    <x-alerta>Conoce a los creadores de la plataforma</x-alerta>
    <ul>
        @forelse ($integrantes as $i)
            <li>{{ $i->nombre }}
                @if ($i->rol == 'Coordinador')
                    ★ Coordinador
                @endif
            </li>
        @empty
            <li>Aún no hay integrantes.</li>
        @endforelse
    </ul>
@endsection
