@extends('layouts.app')
@section('titulo', 'Nuevo Integrante')
@section('contenido')
    <h1>Registrar Integrante</h1>
    <form method="POST" action="/integrantes">
        @csrf
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}">
            @error('nombre') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Rol:</label>
            <input type="text" name="rol" value="{{ old('rol') }}">
            @error('rol') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <button type="submit">Guardar</button>
    </form>
    <p><a href="/integrantes">&larr; Volver a integrantes</a></p>
@endsection
