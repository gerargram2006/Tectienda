<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index()
    {
        // 1. Pedidos con el nombre de su cliente (join) [cite: 33]
        $pedidos = DB::table('pedidos')
            ->join('clientes', 'clientes.id', '=', 'pedidos.cliente_id')
            ->select('clientes.nombre as cliente', 'pedidos.fecha', 'pedidos.total')
            ->orderBy('pedidos.fecha', 'asc')
            ->get();

        // 2. Clientes sin compras (leftJoin + whereNull) [cite: 33]
        $sinCompras = DB::table('clientes')
            ->leftJoin('pedidos', 'clientes.id', '=', 'pedidos.cliente_id')
            ->select('clientes.nombre')
            ->whereNull('pedidos.id')
            ->get();

        return view('reporte', compact('pedidos', 'sinCompras'));
    }
}
