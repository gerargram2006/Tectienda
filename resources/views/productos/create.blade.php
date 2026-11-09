@extends('layouts.app')
@section('titulo', 'Nuevo Producto')
@section('contenido')
    <h1>Registrar Producto</h1>
    <form method="POST" action="/productos">
        @csrf
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" maxlength="100">
            @error('nombre') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Precio (S/):</label>
            <input type="text" name="precio" value="{{ old('precio') }}" inputmode="decimal">
            @error('precio') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Stock:</label>
            <input type="text" name="stock" value="{{ old('stock') }}" inputmode="numeric">
            @error('stock') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <button type="submit">Guardar</button>
    </form>
    <p><a href="/productos">&larr; Volver al catálogo</a></p>
@endsection
