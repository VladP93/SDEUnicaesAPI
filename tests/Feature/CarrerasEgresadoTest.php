<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\CarreraEgresado;

$carreraegresado = new CarreraEgresado;

class CarreraEgresadoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetCarreraEgresado()
    {
        $response = $this->get('api/carrerasegresado');

        $response->assertStatus(200);
    }

    public function testPostCarreraEgresado()
    {
        $carreraegresado->dui = "0000000-0";
        $carreraegresado->idcarrera = 1;

        $response = $this->post('api/carrerasegresado', $carreraegresado->toArray());
        $response->assertStatus(200);
    }
}
