<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\IntegranteController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Catálogo de Productos
Route::get('/productos', [ProductoController::class, 'index']);

// Rutas de productos (CRUD)
Route::get('/productos/create', [ProductoController::class, 'create']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);

// Detalle de Producto por ID (al final para no capturar /productos/create)
Route::get('/productos/{id}', [ProductoController::class, 'show']);

// Ruta para agregar al carrito
Route::get('/carrito/{id}', [CarritoController::class, 'agregar']);

// Lista de Integrantes
Route::get('/integrantes', [IntegranteController::class, 'index']);

// Rutas de integrantes (CRUD)
Route::get('/integrantes/create', [IntegranteController::class, 'create']);
Route::post('/integrantes', [IntegranteController::class, 'store']);
Route::get('/integrantes/{id}/edit', [IntegranteController::class, 'edit']);
Route::put('/integrantes/{id}', [IntegranteController::class, 'update']);
Route::delete('/integrantes/{id}', [IntegranteController::class, 'destroy']);

// Detalle de Integrante por ID (al final para no capturar /integrantes/create)
Route::get('/integrantes/{id}', [IntegranteController::class, 'show']);
