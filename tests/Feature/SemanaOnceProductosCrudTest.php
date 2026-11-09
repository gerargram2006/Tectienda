<?php

namespace Tests\Feature;

use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SemanaOnceProductosCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_formulario_de_registro_renders_correctly(): void
    {
        $response = $this->get('/productos/create');

        $response->assertStatus(200);
        $response->assertSee('Registrar Producto');
        $response->assertSee('Nombre:');
        $response->assertSee('Precio (S/):');
        $response->assertSee('Stock:');
    }

    public function test_ficha_a_se_guarda_correctamente(): void
    {
        $response = $this->post('/productos', [
            'nombre' => 'Mouse gamer',
            'precio' => '89.90',
            'stock' => '10',
        ]);

        $response->assertRedirect('/productos');
        $response->assertSessionHas('mensaje', 'Producto registrado.');
        $response->assertSessionDoesntHaveErrors();

        $this->assertDatabaseHas('productos', [
            'nombre' => 'Mouse gamer',
            'precio' => 89.90,
            'stock' => 10,
        ]);
    }

    public function test_ficha_b_no_se_guarda_por_nombre_vacio(): void
    {
        $response = $this->post('/productos', [
            'nombre' => '',
            'precio' => '35',
            'stock' => '3',
        ]);

        $response->assertSessionHasErrors('nombre');
        $response->assertSessionDoesntHaveErrors(['precio', 'stock']);
        $response->assertSessionHasInput('precio', '35');
        $response->assertSessionHasInput('stock', '3');

        $this->assertDatabaseCount('productos', 0);
    }

    public function test_ficha_c_no_se_guarda_por_precio_no_numerico_y_stock_negativo(): void
    {
        $response = $this->post('/productos', [
            'nombre' => 'Webcam HD',
            'precio' => 'S/ 120',
            'stock' => '-1',
        ]);

        $response->assertSessionHasErrors(['precio', 'stock']);
        $response->assertSessionDoesntHaveErrors('nombre');

        $this->assertDatabaseCount('productos', 0);
    }

    public function test_ficha_d_no_se_guarda_por_stock_decimal(): void
    {
        $response = $this->post('/productos', [
            'nombre' => 'Hub USB',
            'precio' => '45',
            'stock' => '7.5',
        ]);

        $response->assertSessionHasErrors('stock');
        $response->assertSessionDoesntHaveErrors(['nombre', 'precio']);

        $this->assertDatabaseCount('productos', 0);
    }

    public function test_formulario_de_edicion_muestra_los_datos_del_producto(): void
    {
        $producto = Producto::create([
            'nombre' => 'Teclado',
            'precio' => 45,
            'stock' => 7,
        ]);

        $response = $this->get('/productos/'.$producto->id.'/edit');

        $response->assertStatus(200);
        $response->assertSee('Editar Producto');
        $response->assertSee('value="Teclado"', false);
    }

    public function test_ficha_e_no_se_guarda_si_se_borra_el_precio(): void
    {
        $producto = Producto::create([
            'nombre' => 'Teclado',
            'precio' => 45,
            'stock' => 7,
        ]);

        $response = $this->from('/productos/'.$producto->id.'/edit')
            ->put('/productos/'.$producto->id, [
                'nombre' => 'Teclado',
                'precio' => '',
                'stock' => '7',
            ]);

        $response->assertSessionHasErrors('precio');
        $response->assertSessionHasInput('nombre', 'Teclado');
        $response->assertSessionHasInput('stock', '7');

        $this->assertDatabaseHas('productos', [
            'id' => $producto->id,
            'precio' => 45,
        ]);
    }

    public function test_update_actualiza_un_producto_existente(): void
    {
        $producto = Producto::create([
            'nombre' => 'Teclado',
            'precio' => 45,
            'stock' => 7,
        ]);

        $response = $this->put('/productos/'.$producto->id, [
            'nombre' => 'Teclado mecánico',
            'precio' => '59.90',
            'stock' => '12',
        ]);

        $response->assertRedirect('/productos');
        $response->assertSessionHas('mensaje', 'Producto actualizado.');

        $this->assertDatabaseHas('productos', [
            'id' => $producto->id,
            'nombre' => 'Teclado mecánico',
            'precio' => 59.90,
            'stock' => 12,
        ]);
    }
}
