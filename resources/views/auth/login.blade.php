@extends('layouts.app')

@section('titulo', 'Iniciar Sesión')

@section('contenido')
    <h1>Iniciar Sesión de Empleado</h1>

    @if ($errors->any())
        <div style="background-color: #fee2e2; border: 1px solid #ef4444; color: #b91c1c; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <div>
            <label>Correo electrónico:</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="ej. lucia@tectienda.pe">
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required placeholder="••••••••">
        </div>
        <button type="submit">Ingresar</button>
    </form>
    <p><a href="/productos">&larr; Volver al catálogo</a></p>
@endsection
