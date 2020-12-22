<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Usuario;

$usuario = new Usuario;

class UsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUsuario()
    {
        $response = $this->get('api/usuarios');

        $response->assertStatus(200);
    }

    public function testPostUsuario()
    {
        $usuario->dui = "00000000-1";
        $usuario->usuario = "Usuario_test_post";
        $usuario->contrasena = "pass_test_post";
        $usuario->tipoUsuario = 1;

        $response = $this->post('api/usuarios', $usuario->toArray());
        $response->assertStatus(200);
    }

    public function testPutUsuario()
    {
        $usuario->usuario = "Usuario_test_put";

        $response = $this->post('api/usuarios/'.$usuario->dui, $usuario->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteUsuario()
    {
        $response = $this->call('DELETE', 'api/usuarios/'.$usuario->dui);
        $response->assertStatus(200);
    }
}
