@extends('layouts.app')
@section('titulo', 'Detalle de Producto')
@section('contenido')
    <h1>Detalle del Producto</h1>
    <x-alerta>Información detallada del producto</x-alerta>
    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Precio:</strong> S/ {{ number_format($producto->precio, 2) }}</p>
    <p><strong>Stock:</strong> {{ $producto->stock }}
        @if ($producto->stock == 0)
            - Agotado
        @elseif ($producto->stock < 5)
            - ¡Últimas unidades!
        @else
            - Disponible
        @endif
    </p>
    <p>
        <a href="/productos/{{ $producto->id }}/edit">Editar producto</a>
        <a href="{{ url('/productos') }}">← Volver al catálogo</a>
    </p>
@endsection
