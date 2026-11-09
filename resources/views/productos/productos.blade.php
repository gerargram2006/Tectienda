@extends('layouts.app')
@section('titulo', 'Catálogo')
@section('contenido')
    <h1>Catálogo</h1>
    <x-alerta>Revisa nuestras ofertas en tecnología</x-alerta>
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
        </li>
    @empty
        <li>Todavía no hay productos.</li>
    @endforelse
    </ul>
@endsection
