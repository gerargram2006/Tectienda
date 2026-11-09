@extends('layouts.app')
@section('titulo', 'Integrantes')
@section('contenido')
    <h1>Nuestro equipo ({{ $total }} {{ $total == 1 ? 'integrante' : 'integrantes' }})</h1>
    <x-alerta>Conoce a los creadores de la plataforma</x-alerta>
    @if (session('mensaje'))
        <x-alerta>{{ session('mensaje') }}</x-alerta>
    @endif
    <p><a href="/integrantes/create">+ Nuevo integrante</a></p>
    <ul>
        @forelse ($integrantes as $i)
            <li>
                {{ $i->nombre }}
                @if ($i->rol == 'Coordinador')
                    ★ Coordinador
                @else
                    - {{ $i->rol }}
                @endif
                - <a href="/integrantes/{{ $i->id }}/edit">Editar</a>
                <form method="POST" action="/integrantes/{{ $i->id }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar a este integrante?')">
                        Eliminar
                    </button>
                </form>
            </li>
        @empty
            <li>Aún no hay integrantes.</li>
        @endforelse
    </ul>
@endsection
