<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\AptitudEgresado;

$aptitudegresado = new AptitudEgresado;

class AptitudesEgresadoTest extends TestCase
{
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAptitudEgresado()
    {
        $response = $this->get('api/aptitudesegresado');

        $response->assertStatus(200);
    }

    public function testPostAptitudEgresado()
    {
        $aptitudegresado->idaptitud = 3;
        $aptitudegresado->dui = "00000000-0";

        $response = $this->post('api/aptitudesegresado', $aptitudegresado->toArray());
        $response->assertStatus(200);
    }

}
