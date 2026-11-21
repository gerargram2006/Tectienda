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
            <span class="usuario-saludo">Hola, {{ Auth::user()->name }}</span>
            <form method="POST" action="/logout" class="form-logout">
                @csrf
                <button type="submit" class="btn-logout">Cerrar sesión</button>
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
