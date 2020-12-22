<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\TipoUsuario;

$tipousuario = new TipoUsuario;

class TipoUsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTiposUsuario()
    {
        $response = $this->get('api/tiposusuario');

        $response->assertStatus(200);
    }

    public function testPostTiposUsuario()
    {
        $tipousuario->idtipousuario = -1;
        $tipousuario->tipousuario = "TipoUsuario_test_post";

        $response = $this->post('api/tiposusuario', $tipousuario->toArray());
        $response->assertStatus(200);
    }

    public function testPutTiposUsuario()
    {
        $tipousuario->tipousuario = "TipoUsuario_test_put";

        $response = $this->post('api/tiposusuario/'.$tipousuario->idtipousuario, $tipousuario->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteTiposUsuario()
    {
        $response = $this->call('DELETE', 'api/tiposusuario/'.$tipousuario->idtipousuario);
        $response->assertStatus(200);
    }
}
