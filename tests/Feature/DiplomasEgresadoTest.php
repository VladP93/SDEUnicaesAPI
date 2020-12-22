<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\DiplomaCertificacionEgresado;

$diplomacertificacionegresado = new DiplomaCertificacionEgresado;

class DiplomasEgresadoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetDiplomasEgresado()
    {
        $response = $this->get('api/diplomasegresado');

        $response->assertStatus(200);
    }

    public function testPostDiplomasEgresado()
    {
        $diplomacertificacionegresado->dui = "0000000-0";
        $diplomacertificacionegresado->diplomacertificacion = 1;
        $diplomacertificacionegresado->fecha = date("Y/m/d");
        $diplomacertificacionegresado->foto = "";

        $response = $this->post('api/diplomasegresado', $diplomacertificacionegresado->toArray());
        $response->assertStatus(200);
    }
}
