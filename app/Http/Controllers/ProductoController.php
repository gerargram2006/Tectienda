<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

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

    // Mostrar el formulario para registrar un producto
    public function create()
    {
        return view('productos.create');
    }

    // Guardar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'precio' => 'required|numeric|gt:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Solo guardamos los campos permitidos por el modelo
        Producto::create($request->only('nombre', 'precio', 'stock'));

        return redirect('/productos')->with('mensaje', 'Producto registrado.');
    }

    // Mostrar el formulario para editar un producto
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('productos.edit', compact('producto'));
    }

    // Actualizar un producto existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'precio' => 'required|numeric|gt:0',
            'stock' => 'required|integer|min:0',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->only('nombre', 'precio', 'stock'));

        return redirect('/productos')->with('mensaje', 'Producto actualizado.');
    }
}
