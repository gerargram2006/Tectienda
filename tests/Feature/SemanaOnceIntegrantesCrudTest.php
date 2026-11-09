<?php

namespace Tests\Feature;

use App\Models\Integrante;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SemanaOnceIntegrantesCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_formulario_de_registro_renders_correctly(): void
    {
        $response = $this->get('/integrantes/create');

        $response->assertStatus(200);
        $response->assertSee('Registrar Integrante');
        $response->assertSee('Nombre:');
        $response->assertSee('Rol:');
    }

    public function test_registro_vacio_muestra_errores_de_validacion(): void
    {
        $response = $this->post('/integrantes', [
            'nombre' => '',
            'rol' => '',
        ]);

        $response->assertSessionHasErrors(['nombre', 'rol']);
        $this->assertDatabaseCount('integrantes', 0);
    }

    public function test_registro_solo_con_nombre_muestra_error_en_el_rol(): void
    {
        $response = $this->post('/integrantes', [
            'nombre' => 'Hugo Florez',
            'rol' => '',
        ]);

        $response->assertSessionHasErrors('rol');
        $response->assertSessionDoesntHaveErrors('nombre');
        $this->assertDatabaseCount('integrantes', 0);
    }

    public function test_store_registra_un_integrante_y_redirige_con_mensaje(): void
    {
        $response = $this->post('/integrantes', [
            'nombre' => 'Hugo Florez',
            'rol' => 'Coordinador',
        ]);

        $response->assertRedirect('/integrantes');
        $response->assertSessionHas('mensaje', 'Integrante registrado.');
        $this->assertDatabaseHas('integrantes', [
            'nombre' => 'Hugo Florez',
            'rol' => 'Coordinador',
        ]);
    }

    public function test_lista_muestra_el_mensaje_y_la_estrella_del_coordinador(): void
    {
        Integrante::create([
            'nombre' => 'Hugo Florez',
            'rol' => 'Coordinador',
        ]);

        $response = $this->withSession(['mensaje' => 'Integrante registrado.'])
            ->get('/integrantes');

        $response->assertStatus(200);
        $response->assertSee('Integrante registrado.');
        $response->assertSee('Hugo Florez');
        $response->assertSee('★ Coordinador');
    }

    public function test_formulario_de_edicion_muestra_los_datos_del_integrante(): void
    {
        $integrante = Integrante::create([
            'nombre' => 'Gerar Camma',
            'rol' => 'Miembro',
        ]);

        $response = $this->get('/integrantes/'.$integrante->id.'/edit');

        $response->assertStatus(200);
        $response->assertSee('Editar Integrante');
        $response->assertSee('value="Gerar Camma"', false);
        $response->assertSee('value="Miembro"', false);
    }

    public function test_update_actualiza_el_rol_del_integrante(): void
    {
        $integrante = Integrante::create([
            'nombre' => 'Gerar Camma',
            'rol' => 'Miembro',
        ]);

        $response = $this->put('/integrantes/'.$integrante->id, [
            'nombre' => 'Gerar Camma',
            'rol' => 'Coordinador',
        ]);

        $response->assertRedirect('/integrantes');
        $response->assertSessionHas('mensaje', 'Integrante actualizado.');
        $this->assertDatabaseHas('integrantes', [
            'id' => $integrante->id,
            'rol' => 'Coordinador',
        ]);
    }

    public function test_update_valida_los_campos_requeridos(): void
    {
        $integrante = Integrante::create([
            'nombre' => 'Gerar Camma',
            'rol' => 'Miembro',
        ]);

        $response = $this->put('/integrantes/'.$integrante->id, [
            'nombre' => '',
            'rol' => '',
        ]);

        $response->assertSessionHasErrors(['nombre', 'rol']);
        $this->assertDatabaseHas('integrantes', [
            'id' => $integrante->id,
            'nombre' => 'Gerar Camma',
            'rol' => 'Miembro',
        ]);
    }

    public function test_lista_ordena_alfabeticamente_y_muestra_el_total(): void
    {
        Integrante::create(['nombre' => 'Zulema Rojas', 'rol' => 'Miembro']);
        Integrante::create(['nombre' => 'Ana Torres', 'rol' => 'Miembro']);
        Integrante::create(['nombre' => 'Marco Diaz', 'rol' => 'Coordinador']);

        $response = $this->get('/integrantes');

        $response->assertStatus(200);
        $response->assertSee('Nuestro equipo (3 integrantes)');
        $response->assertSeeInOrder(['Ana Torres', 'Marco Diaz', 'Zulema Rojas']);
        $response->assertSee('- Miembro');
        $response->assertSee('★ Coordinador');
        $response->assertSee('Eliminar');
    }

    public function test_destroy_elimina_un_integrante_y_redirige_con_mensaje(): void
    {
        $integrante = Integrante::create([
            'nombre' => 'Hugo Florez',
            'rol' => 'Miembro',
        ]);

        $response = $this->delete('/integrantes/'.$integrante->id);

        $response->assertRedirect('/integrantes');
        $response->assertSessionHas('mensaje', 'Integrante eliminado.');
        $this->assertDatabaseMissing('integrantes', ['id' => $integrante->id]);
        $this->assertDatabaseCount('integrantes', 0);
    }
}
