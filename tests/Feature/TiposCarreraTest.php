<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\TipoCarrera;

$tipocarrera = new TipoCarrera;

class TiposCarreraTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTiposCarrera()
    {
        $response = $this->get('api/tiposcarrera');

        $response->assertStatus(200);
    }

    public function testPostTiposCarrera()
    {
        $tipocarrera->idtipocarrera = -1;
        $tipocarrera->tipocarrera = "TipoCarrera_test_post";

        $response = $this->post('api/tiposcarrera', $tipocarrera->toArray());
        $response->assertStatus(200);
    }

    public function testPutTiposCarrera()
    {
        $tipocarrera->tipocarrera = "TipoCarrera_test_put";

        $response = $this->post('api/tiposcarrera/'.$tipocarrera->idtipocarrera, $tipocarrera->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteTiposCarrera()
    {
        $response = $this->call('DELETE', 'api/tiposcarrera/'.$tipocarrera->idtipocarrera);
        $response->assertStatus(200);
    }
}
