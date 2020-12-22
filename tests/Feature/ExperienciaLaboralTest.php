<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\ExperienciaLaboral;

$experiencialaboral = new ExperienciaLaboral;

class ExperienciaLaboralTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetExperienciaLaboral()
    {
        $response = $this->get('api/experiencialaboral');

        $response->assertStatus(200);
    }

    public function testPostExperienciaLaboral()
    {
        $experiencialaboral->idexperiencia = -1;
        $experiencialaboral->egresado = "0000000-0";
        $experiencialaboral->institucion = 1;
        $experiencialaboral->cargo = 1;
        $experiencialaboral->arealaboral =1;
        $experiencialaboral->fechainicio = date("Y-m-d");
        $experiencialaboral->fechafin = date("Y-m-d");

        $response = $this->post('api/experiencialaboral', $experiencialaboral->toArray());
        $response->assertStatus(200);
    }

    public function testPutExperienciaLaboral()
    {
        $experiencialaboral->arealaboral = 2;

        $response = $this->post('api/experiencialaboral/'.$experiencialaboral->idexperiencia, $experiencialaboral->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteExperienciaLaboral()
    {
        $response = $this->call('DELETE', 'api/experiencialaboral/'.$experiencialaboral->idexperiencia);
        $response->assertStatus(200);
    }
}
