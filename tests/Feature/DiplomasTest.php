<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\DiplomaCertificacion;

$diplomacertificacion = new DiplomaCertificacion;

class DiplomaCertificacionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetDiplomaCertificacion()
    {
        $response = $this->get('api/diplomas');

        $response->assertStatus(200);
    }

    public function testPostDiplomaCertificacion()
    {
        $diplomacertificacion->iddiplomacertificacion = -1;
        $diplomacertificacion->nombre = "Diploma_test_post";
        $diplomacertificacion->institucion = 1;
        $diplomacertificacion->areaLaboral = 1;

        $response = $this->post('api/diplomas', $diplomacertificacion->toArray());
        $response->assertStatus(200);
    }

    public function testPutDiplomaCertificacion()
    {
        $diplomacertificacion->nombre = "Diploma_test_put";

        $response = $this->post('api/diplomas/'.$diplomacertificacion->iddiplomacertificacion, $diplomacertificacion->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteDiplomaCertificacion()
    {
        $response = $this->call('DELETE', 'api/diplomas/'.$diplomacertificacion->iddiplomacertificacion);
        $response->assertStatus(200);
    }
}
