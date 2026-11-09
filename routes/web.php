<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Catálogo de Productos
Route::get('/productos', [ProductoController::class, 'index']);

// Detalle de Producto por ID
Route::get('/productos/{id}', [ProductoController::class, 'show']);

// Ruta para agregar al carrito
Route::get('/carrito/{id}', [CarritoController::class, 'agregar']);
