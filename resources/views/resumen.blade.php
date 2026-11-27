@extends('layouts.app')

@section('titulo', 'Tablero de Progreso - TecTienda')

@section('contenido')
    <h1>Tablero de Progreso del Proyecto</h1>

    <x-alerta>
        Esta página resume todo lo desarrollado en TecTienda. Cada módulo tiene enlaces directos para probarlo.
    </x-alerta>

    <!-- Resumen numérico -->
    <div class="resumen-numeros" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.25rem; box-shadow: var(--sombra); text-align: center;">
            <div style="font-size: 2rem; font-weight: 800; color: var(--primario);">{{ $totalProductos }}</div>
            <div style="color: var(--texto-suave); font-size: 0.9rem;">Productos registrados</div>
        </div>
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.25rem; box-shadow: var(--sombra); text-align: center;">
            <div style="font-size: 2rem; font-weight: 800; color: var(--acento);">{{ $totalIntegrantes }}</div>
            <div style="color: var(--texto-suave); font-size: 0.9rem;">Integrantes del equipo</div>
        </div>
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.25rem; box-shadow: var(--sombra); text-align: center;">
            <div style="font-size: 2rem; font-weight: 800; color: #06b6d4;">{{ $totalPedidos }}</div>
            <div style="color: var(--texto-suave); font-size: 0.9rem;">Pedidos registrados</div>
        </div>
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.25rem; box-shadow: var(--sombra); text-align: center;">
            <div style="font-size: 2rem; font-weight: 800; color: #10b981;">S/ {{ number_format($totalVentas, 2) }}</div>
            <div style="color: var(--texto-suave); font-size: 0.9ref;">Ventas totales</div>
        </div>
    </div>

    <h2 style="margin-top: 2rem;">Módulos desarrollados</h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem;">

        <!-- Catálogo de Productos -->
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.5rem; box-shadow: var(--sombra);">
            <h3 style="margin-top: 0; color: var(--primario);">📦 Catálogo de Productos</h3>
            <p style="color: var(--texto-suave); font-size: 0.9rem; margin-bottom: 1rem;">
                CRUD completo de productos: listar, ver detalle, crear, editar y eliminar.
            </p>
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <a href="/productos" style="display: inline-block; padding: 0.5rem 1rem; background: #eef2ff; color: var(--primario); text-decoration: none; border-radius: 9px; font-weight: 700; font-size: 0.9rem;">Ver catálogo</a>
                @auth
                    <a href="/productos/create" style="display: inline-block; padding: 0.5rem 1rem; background: var(--primario); color: #ffffff; text-decoration: none; border-radius: 9px; font-weight: 700; font-size: 0.9rem;">+ Nuevo producto</a>
                @endauth
            </div>
        </div>

        <!-- API de Productos -->
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.5rem; box-shadow: var(--sombra);">
            <h3 style="margin-top: 0; color: var(--acento);">🔌 API de Productos</h3>
            <p style="color: var(--texto-suave); font-size: 0.9rem; margin-bottom: 1rem;">
                Endpoints REST para consultar y crear productos en formato JSON.
            </p>
            <div style="display: flex; flex-direction: column; gap: 0.5rem; font-family: monospace; font-size: 0.85rem; color: var(--texto-suave);">
                <div>GET /api/productos</div>
                <div>GET /api/productos/{id}</div>
                <div>POST /api/productos</div>
            </div>
        </div>

        <!-- Integrantes -->
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.5rem; box-shadow: var(--sombra);">
            <h3 style="margin-top: 0; color: #7c3aed;">👥 Integrantes del Equipo</h3>
            <p style="color: var(--texto-suave); font-size: 0.9rem; margin-bottom: 1rem;">
                CRUD de integrantes: registro, edición, eliminación y listado con roles.
            </p>
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <a href="/integrantes" style="display: inline-block; padding: 0.5rem 1rem; background: #f5f3ff; color: #7c3aed; text-decoration: none; border-radius: 9px; font-weight: 700; font-size: 0.9rem;">Ver integrantes</a>
                <a href="/integrantes/create" style="display: inline-block; padding: 0.5rem 1rem; background: #7c3aed; color: #ffffff; text-decoration: none; border-radius: 9px; font-weight: 700; font-size: 0.9rem;">+ Nuevo integrante</a>
            </div>
        </div>

        <!-- Reporte de Pedidos -->
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.5rem; box-shadow: var(--sombra);">
            <h3 style="margin-top: 0; color: #06b6d4;">📊 Reporte del Gerente</h3>
            <p style="color: var(--texto-suave); font-size: 0.9rem; margin-bottom: 1rem;">
                Listado de pedidos con clientes y detección de clientes sin compras.
            </p>
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <a href="/reporte" style="display: inline-block; padding: 0.5rem 1rem; background: #ecfeff; color: #06b6d4; text-decoration: none; border-radius: 9px; font-weight: 700; font-size: 0.9rem;">Ver reporte</a>
            </div>
        </div>

        <!-- Autenticación -->
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.5rem; box-shadow: var(--sombra);">
            <h3 style="margin-top: 0; color: #dc2626;">🔐 Autenticación</h3>
            <p style="color: var(--texto-suave); font-size: 0.9rem; margin-bottom: 1rem;">
                Inicio de sesión y cierre de sesión para proteger rutas de empleados.
            </p>
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                @guest
                    <a href="/login" style="display: inline-block; padding: 0.5rem 1rem; background: #fef2f2; color: #dc2626; text-decoration: none; border-radius: 9px; font-weight: 700; font-size: 0.9rem;">Iniciar sesión</a>
                @else
                    <a href="/logout" style="display: inline-block; padding: 0.5rem 1rem; background: #fef2f2; color: #dc2626; text-decoration: none; border-radius: 9px; font-weight: 700; font-size: 0.9rem;">Cerrar sesión</a>
                @endguest
            </div>
        </div>

        <!-- Carrito de compras -->
        <div style="background: var(--superficie); border: 1px solid var(--borde); border-radius: var(--radio); padding: 1.5rem; box-shadow: var(--sombra);">
            <h3 style="margin-top: 0; color: #10b981;">🛒 Carrito de Compras</h3>
            <p style="color: var(--texto-suave); font-size: 0.9rem; margin-bottom: 1rem;">
                Agregar productos al carrito con verificación de stock disponible.
            </p>
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <a href="/productos" style="display: inline-block; padding: 0.5rem 1rem; background: #f0fdf4; color: #10b981; text-decoration: none; border-radius: 9px; font-weight: 700; font-size: 0.9rem;">Ir al catálogo y agregar</a>
            </div>
        </div>

    </div>

@endsection
