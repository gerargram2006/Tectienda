<?php

namespace App\Http\Controllers;

use App\Models\Integrante;
use Illuminate\Http\Request;

class IntegranteController extends Controller
{
    // Mostrar todos los integrantes
    public function index()
    {
        // Traemos todos los integrantes de la tabla
        $integrantes = Integrante::all();

        return view('integrantes.index', compact('integrantes'));
    }

    // Mostrar un solo integrante
    public function show($id)
    {
        // Buscamos al integrante por su ID
        $integrante = Integrante::findOrFail($id);

        return view('integrantes.show', compact('integrante'));
    }

    // Mostrar el formulario para registrar un integrante
    public function create()
    {
        return view('integrantes.create');
    }

    // Guardar un nuevo integrante
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:60',
            'rol' => 'required',
        ]);

        // Solo guardamos los campos permitidos por el modelo
        Integrante::create($request->only('nombre', 'rol'));

        return redirect('/integrantes')->with('mensaje', 'Integrante registrado.');
    }

    // Mostrar el formulario para editar un integrante
    public function edit($id)
    {
        $integrante = Integrante::findOrFail($id);

        return view('integrantes.edit', compact('integrante'));
    }

    // Actualizar un integrante existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:60',
            'rol' => 'required',
        ]);

        $integrante = Integrante::findOrFail($id);
        $integrante->update($request->only('nombre', 'rol'));

        return redirect('/integrantes')->with('mensaje', 'Integrante actualizado.');
    }
}
