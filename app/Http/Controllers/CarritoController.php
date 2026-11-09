<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar(Request $request, $id)
    {
        // Obtiene la cantidad del query parameter ?cantidad=2 (por defecto 1)
        $cantidad = $request->input('cantidad', 1);

        // Busca el producto en MariaDB por su ID
        $producto = Producto::find($id);

        // Si el producto no existe en la base de datos
        if (! $producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        // Validación de stock
        if ($producto->stock < $cantidad) {
            return view('carrito.resultado', [
                'exito' => false,
                'mensaje' => "Stock insuficiente. Solo quedan {$producto->stock} unidades disponibles.",
                'producto' => $producto,
            ]);
        }

        // Si hay suficiente stock
        return view('carrito.resultado', [
            'exito' => true,
            'mensaje' => "Se agregaron {$cantidad} unidad(es) de '{$producto->nombre}' al carrito correctamente.",
            'producto' => $producto,
            'cantidad' => $cantidad,
        ]);
    }
}
