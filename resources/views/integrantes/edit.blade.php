    @extends('layouts.app')
    @section('titulo', 'Editar Integrante')
    @section('contenido')
        <h1>Editar Integrante</h1>
        <form method="POST" action="/integrantes/{{ $integrante->id }}">
            @csrf
            @method('PUT')
            <div>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre', $integrante->nombre) }}">
                @error('nombre') <div style="color:red;">{{ $message }}</div> @enderror
            </div>
            <div>
                <label>Rol:</label>
                <input type="text" name="rol" value="{{ old('rol', $integrante->rol) }}">
                @error('rol') <div style="color:red;">{{ $message }}</div> @enderror
            </div>
            <button type="submit">Actualizar</button>
        </form>
        <p><a href="/integrantes">&larr; Volver a integrantes</a></p>
    @endsection
