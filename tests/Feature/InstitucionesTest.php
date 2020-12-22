<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Institucion;

$institucion = new Institucion;

class InstitucionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetInstitucion()
    {
        $response = $this->get('api/instituciones');

        $response->assertStatus(200);
    }

    public function testPostInstitucion()
    {
        $institucion->idinstitucion = -1;
        $institucion->nombre = "Institucion_test_post";
        $institucion->ubicacion = 1;
        $institucion->telefono = "0000-0000";

        $response = $this->post('api/instituciones', $institucion->toArray());
        $response->assertStatus(200);
    }

    public function testPutInstitucion()
    {
        $institucion->nombre = "Institucion_test_put";

        $response = $this->post('api/instituciones/'.$institucion->idinstitucion, $institucion->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteInstitucion()
    {
        $response = $this->call('DELETE', 'api/instituciones/'.$institucion->idinstitucion);
        $response->assertStatus(200);
    }
}
