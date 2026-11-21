@extends('layouts.app')

@section('titulo', 'Catálogo de Productos')

@section('contenido')
    <h1>Catálogo de TecTienda</h1>

    @auth
        <div style="margin-bottom: 15px;">
            <a href="/productos/create">+ Nuevo producto</a>
        </div>
    @endauth

    <div class="tabla-contenedor">
    <table class="tabla">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                @auth
                    <th>Acciones</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>S/ {{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    @auth
                        <td>
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
