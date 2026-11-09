<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecTienda - Carrito de Compras</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; padding: 40px; }
        .card { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); max-width: 500px; margin: 0 auto; }
        .alert-success { background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .alert-danger { background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .detalle { border-top: 1px solid #eee; pt: 15px; margin-top: 15px; }
    </style>
</head>
<body>
<div class="card">
    <h2>🛒 TecTienda - Estado del Carrito</h2>

    @if($exito)
        <div class="alert-success">
            <strong>¡Éxito!</strong> {{ $mensaje }}
        </div>
    @else
        <div class="alert-danger">
            <strong>¡Atención!</strong> {{ $mensaje }}
        </div>
    @endif

    <div class="detalle">
        <h3>Detalles del Producto</h3>
        <p><strong>Producto:</strong> {{ $producto->nombre }}</p>
        <p><strong>Precio unitario:</strong> S/ {{ number_format($producto->precio, 2) }}</p>
        <p><strong>Stock disponible en almacén:</strong> {{ $producto->stock }} unidades</p>
    </div>
</div>
</body>
</html>
