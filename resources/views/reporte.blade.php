@extends('layouts.app')

@section('titulo', 'Reporte del Gerente')

@section('contenido')
    <h1>Reporte de Pedidos</h1>

    <div class="tabla-contenedor">
        <table class="tabla">
            <thead>
            <tr>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pedidos as $p)
                <tr>
                    <td>{{ $p->cliente }}</td>
                    <td>{{ $p->fecha }}</td>
                    <td>S/ {{ $p->total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <h2>Clientes sin compras</h2>
    <ul>
        @forelse($sinCompras as $c)
            <li>{{ $c->nombre }}</li>
        @empty
            <li>Todos los clientes tienen al menos un pedido.</li>
        @endforelse
    </ul>
@endsection
