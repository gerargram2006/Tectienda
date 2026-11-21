@extends('layouts.app')

@section('titulo', 'Iniciar Sesión')

@section('contenido')
    <div style="max-width: 480px; margin: 1.5rem auto;">
        <h1>Iniciar Sesión</h1>
        <p style="color: var(--texto-suave); margin-bottom: 1.5rem;">Ingresa tus credenciales de empleado para acceder al panel de administración.</p>

        @if ($errors->any())
            <div style="background-color: #fee2e2; border: 1px solid #ef4444; color: #b91c1c; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/login" style="margin: 0 auto;">
            @csrf
            <div>
                <label>Correo electrónico:</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="ej. lucia@tectienda.pe">
            </div>
            <div>
                <label>Contraseña:</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            <button type="submit" style="width: 100%; margin-top: 0.5rem;">Ingresar a TecTienda</button>
        </form>
        <p style="text-align: center; margin-top: 1.5rem;">
            <a href="/productos">&larr; Volver al catálogo</a>
        </p>
    </div>
@endsection
