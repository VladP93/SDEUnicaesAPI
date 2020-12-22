<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Departamento;

$departamento = new Departamento;

class DepartamentoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetDepartamento()
    {
        $response = $this->get('api/departamentos');

        $response->assertStatus(200);
    }

    public function testPostDepartamento()
    {
        $departamento->iddepartamento = -1;
        $departamento->departamento = "Departamento_test_post";

        $response = $this->post('api/departamentos', $departamento->toArray());
        $response->assertStatus(200);
    }

    public function testPutDepartamento()
    {
        $departamento->departamento = "Departamento_test_put";

        $response = $this->post('api/departamentos/'.$departamento->iddepartamento, $departamento->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteDepartamento()
    {
        $response = $this->call('DELETE', 'api/departamento/'.$departamento->iddepartamento);
        $response->assertStatus(200);
    }
}
