<?php

namespace Tests\Feature;

use App\Models\Integrante;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SemanaDiezBladeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Producto::create([
            'nombre' => 'Laptop Lenovo',
            'precio' => 2499.00,
            'stock' => 3,
        ]);

        Integrante::create([
            'nombre' => 'Gerar Camma',
            'rol' => 'Coordinador',
        ]);
    }

    public function test_catalogo_productos_renders_correctly(): void
    {
        $response = $this->get('/productos');

        $response->assertStatus(200);
        $response->assertSee('Catálogo');
        $response->assertSee('Revisa nuestras ofertas en tecnología');
        $response->assertSee('Laptop Lenovo');
        $response->assertSee('TecTienda · 054-123456');
    }

    public function test_detalle_producto_renders_correctly(): void
    {
        $producto = Producto::first();

        $response = $this->get('/productos/'.$producto->id);

        $response->assertStatus(200);
        $response->assertSee('Detalle del Producto');
        $response->assertSee('Laptop Lenovo');
        $response->assertSee('TecTienda · 054-123456');
    }

    public function test_integrantes_renders_correctly(): void
    {
        $response = $this->get('/integrantes');

        $response->assertStatus(200);
        $response->assertSee('Nuestro equipo');
        $response->assertSee('Conoce a los creadores de la plataforma');
        $response->assertSee('Gerar Camma');
        $response->assertSee('★ Coordinador');
        $response->assertDontSee('Hugo Florez');
        $response->assertSee('TecTienda · 054-123456');
    }

    public function test_detalle_integrante_renders_correctly(): void
    {
        $response = $this->get('/integrantes/1');

        $response->assertStatus(200);
        $response->assertSee('Detalle del Integrante');
        $response->assertSee('Gerar Camma');
        $response->assertSee('★ Coordinador');
        $response->assertSee('TecTienda · 054-123456');
    }
}
