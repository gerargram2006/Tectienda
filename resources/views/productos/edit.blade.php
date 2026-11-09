@extends('layouts.app')
@section('titulo', 'Editar Producto')
@section('contenido')
    <h1>Editar Producto</h1>
    <form method="POST" action="/productos/{{ $producto->id }}">
        @csrf
        @method('PUT')
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" maxlength="100">
            @error('nombre') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Precio (S/):</label>
            <input type="text" name="precio" value="{{ old('precio', $producto->precio) }}" inputmode="decimal">
            @error('precio') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Stock:</label>
            <input type="text" name="stock" value="{{ old('stock', $producto->stock) }}" inputmode="numeric">
            @error('stock') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <button type="submit">Actualizar</button>
    </form>
    <p><a href="/productos">&larr; Volver al catálogo</a></p>
@endsection
