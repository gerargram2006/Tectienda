<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        // Traemos todos los productos de la base de datos
        $productos = Producto::all();

        return view('productos.index', compact('productos'));
    }

    // Mostrar un solo producto
    public function show($id)
    {
        // Buscamos el producto por su ID
        $producto = Producto::findOrFail($id);

        return view('productos.show', compact('producto'));
    }
}
