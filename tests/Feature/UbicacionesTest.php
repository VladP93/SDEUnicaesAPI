<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Ubicacion;

$ubicacion = new Ubicacion;

class UbicacionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUbicacion()
    {
        $response = $this->get('api/ubicaciones');

        $response->assertStatus(200);
    }

    public function testPostUbicacion()
    {
        $ubicacion->idubicacion = -1;
        $ubicacion->idmunicipio = 1;
        $ubicacion->direccion = "Ubicacion_test_post";

        $response = $this->post('api/ubicaciones', $ubicacion->toArray());
        $response->assertStatus(200);
    }

    public function testPutUbicacion()
    {
        $ubicacion->direccion = "Ubicacion_test_put";

        $response = $this->post('api/ubicaciones/'.$ubicacion->idubicacion, $ubicacion->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteUbicacion()
    {
        $response = $this->call('DELETE', 'api/ubicaciones/'.$ubicacion->idubicacion);
        $response->assertStatus(200);
    }
}
