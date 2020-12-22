<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Carrera;

$carrera = new Carrera;

class CarreraTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetCarrea()
    {
        $response = $this->get('api/carreras');

        $response->assertStatus(200);
    }

    public function testPostCarrera()
    {
        $carrera->idcarrera = -1;
        $carrera->carrera = "Carrera_test_post";
        $carrera->tipocarrera = 1;

        $response = $this->post('api/carreras', $carrera->toArray());
        $response->assertStatus(200);
    }

    public function testPutCarrera()
    {
        $carrera->carrera = "Carrera_test_put";

        $response = $this->post('api/carreras/'.$carrera->idcarrera, $carrera->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteCarrera()
    {
        $response = $this->call('DELETE', 'api/carreras/'.$carrera->id);
        $response->assertStatus(200);
    }
}
