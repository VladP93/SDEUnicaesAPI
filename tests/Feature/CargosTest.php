<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Cargo;

$cargo = new Cargo;

class CargosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetCargo()
    {
        $response = $this->get('api/cargos');

        $response->assertStatus(200);
    }

    public function testPostCargo()
    {
        $cargo->idcargo = -1;
        $cargo->cargo = "Cargo_test_post";

        $response = $this->post('api/cargos', $cargo->toArray());
        $response->assertStatus(200);
    }

    public function testPutCargo()
    {
        $cargo->cargo = "Cargo_test_put";

        $response = $this->post('api/cargos/'.$cargo->idcargo, $cargo->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteCargo()
    {
        $response = $this->call('DELETE', 'api/cargos/'.$cargo->idcargo);
        $response->assertStatus(200);
    }
}
