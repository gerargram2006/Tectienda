<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Agrega productos de ejemplo al catálogo de TecTienda.
     */
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Teclado mecánico RGB', 'precio' => 159.90, 'stock' => 12],
            ['nombre' => 'Monitor LED 24" Full HD', 'precio' => 549.00, 'stock' => 6],
            ['nombre' => 'Laptop Lenovo IdeaPad 3', 'precio' => 2499.00, 'stock' => 3],
            ['nombre' => 'Audífonos Bluetooth', 'precio' => 129.90, 'stock' => 25],
            ['nombre' => 'Webcam HD 1080p', 'precio' => 99.90, 'stock' => 4],
            ['nombre' => 'Hub USB-C 7 en 1', 'precio' => 89.00, 'stock' => 18],
            ['nombre' => 'Disco SSD 1TB', 'precio' => 329.90, 'stock' => 0],
            ['nombre' => 'Base refrigerante para laptop', 'precio' => 59.90, 'stock' => 8],
        ];

        foreach ($productos as $producto) {
            Producto::updateOrCreate(
                ['nombre' => $producto['nombre']],
                [
                    'precio' => $producto['precio'],
                    'stock' => $producto['stock'],
                ],
            );
        }
    }
}
