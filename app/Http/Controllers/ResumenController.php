<?php

namespace App\Http\Controllers;

use App\Models\Integrante;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ResumenController extends Controller
{
    /**
     * Muestra en una sola página todo lo realizado en el proyecto TecTienda.
     */
    public function index()
    {
        $totalProductos = Producto::count();
        $totalIntegrantes = Integrante::count();

        $totalPedidos = 0;
        $totalVentas = 0.00;
        if (DB::getSchemaBuilder()->hasTable('pedidos')) {
            $totalPedidos = DB::table('pedidos')->count();
            $totalVentas = (float) DB::table('pedidos')->sum('total');
        }

        return view('resumen', compact(
            'totalProductos',
            'totalIntegrantes',
            'totalPedidos',
            'totalVentas'
        ));
    }
}
