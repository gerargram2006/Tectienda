@extends('layouts.app')

@section('titulo', 'Catálogo de Productos')

@section('contenido')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
        <h1 style="margin: 0;">Catálogo de TecTienda</h1>

        @auth
            <div>
                <a href="/productos/create">+ Nuevo producto</a>
            </div>
        @endauth
    </div>

    @if (session('mensaje'))
        <div style="padding: 0.75rem 1rem; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; border-radius: 10px; margin-bottom: 1.25rem; font-weight: 600;">
            ✓ {{ session('mensaje') }}
        </div>
    @endif

    <div class="tabla-contenedor">
        <table border="1" style="width: 100%; text-align: left;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    @auth
                        <th style="text-align: right;">Acciones</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td style="font-weight: 600;">{{ $producto->nombre }}</td>
                        <td>S/ {{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->stock }}</td>
                        @auth
                            <td style="text-align: right; white-space: nowrap;">
                                <a href="/productos/{{ $producto->id }}/edit">Editar</a>
                                <form method="POST" action="/productos/{{ $producto->id }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
