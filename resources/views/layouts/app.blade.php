<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/tectienda.css') }}">
</head>
<body>
<nav>
    <span class="marca">⚡ TecTienda</span>
    <span class="separador">·</span>
    <div class="nav-links">
        <a href="/productos">Productos</a>
        <a href="/integrantes">Integrantes</a>
        @auth
            <span style="display: inline-flex; align-items: center; padding: 0.45rem 0.8rem; font-weight: 600; color: #a5f3fc;">
                Hola, {{ Auth::user()->name }}
            </span>
            <form method="POST" action="/logout" style="display: inline; margin: 0;">
                @csrf
                <button type="submit" style="background: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); color: #ffffff; padding: 0.45rem 0.85rem; border-radius: 999px; font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: background 0.2s;">
                    Cerrar sesión
                </button>
            </form>
        @else
            <a href="/login">Iniciar sesión</a>
        @endauth
    </div>
</nav>
<main>
    @yield('contenido')
</main>
<footer>TecTienda · 054-123456 -- Gerar Camma</footer>
</body>
</html>
