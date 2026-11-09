@extends('layouts.app')
@section('titulo', 'Catálogo')
@section('contenido')
    <h1>Catálogo</h1>
    <x-alerta>Revisa nuestras ofertas en tecnología</x-alerta>
    @if (session('mensaje'))
        <div style="color: green;">{{ session('mensaje') }}</div>
    @endif
    <p><a href="/productos/create">+ Registrar producto</a></p>
    <ul>
    @forelse ($productos as $p)
        <li>{{ $p->nombre }}
            @if ($p->stock == 0)
                - Agotado
            @elseif ($p->stock < 5)
                - ¡Últimas unidades!
            @else
                - Disponible
            @endif
            - <a href="/productos/{{ $p->id }}">Ver</a>
            - <a href="/productos/{{ $p->id }}/edit">Editar</a>
        </li>
    @empty
        <li>Todavía no hay productos.</li>
    @endforelse
    </ul>
@endsection
