<?php

namespace App\Http\Controllers;

use App\Models\Integrante;

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
}
