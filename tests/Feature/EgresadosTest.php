<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Egresado;

$egresado = new Egresado;

class EgresadoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetEgresado()
    {
        $response = $this->get('api/egresados');

        $response->assertStatus(200);
    }

    public function testPostEgresado()
    {
        $egresado->dui = "0000000-0";
        $egresado->carnet = "0000-BB-000";

        $response = $this->post('api/egresados', $egresado->toArray());
        $response->assertStatus(200);
    }

    public function testPutEgresado()
    {
        $egresado->carnet = "0000-FF-000";

        $response = $this->post('api/egresados/'.$egresado->dui, $egresado->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteEgresado()
    {
        $response = $this->call('DELETE', 'api/egresados/'.$egresado->dui);
        $response->assertStatus(200);
    }
}
