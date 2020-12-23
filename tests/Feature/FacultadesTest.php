<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Facultad;

$facultad = new Facultad;

class FacultadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetFacultad()
    {
        $response = $this->get('api/facultades');

        $response->assertStatus(200);
    }

    public function testPostFacultad()
    {
        $facultad->idfacultad = -1;
        $facultad->facultad = "Facultad_test_post";
        $facultad->idubicacion = 1;

        $response = $this->post('api/facultades', $facultad->toArray());
        $response->assertStatus(200);
    }

    public function testPutFacultad()
    {
        $facultad->facultad = "Facultad_test_put";

        $response = $this->post('api/facultades/'.$facultad->idfacultad, $facultad->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteFacultad()
    {
        $response = $this->call('DELETE', 'api/facultad/'.$facultad->idfacultad);
        $response->assertStatus(200);
    }
}
