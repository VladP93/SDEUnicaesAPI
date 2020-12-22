<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Aptitud;

$aptitud = new Aptitud;

class AptitudesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAptitud()
    {
        $response = $this->get('api/aptitudes');

        $response->assertStatus(200);
    }

    public function testPostAptitud()
    {
        $aptitud->idaptitud = -1;
        $aptitud->aptitud = "Aptitud_test_post";

        $response = $this->post('api/aptitudes', $aptitud->toArray());
        $response->assertStatus(200);
    }

    public function testPutAptitud()
    {
        $aptitud->aptitud = "Aptitud_test_put";

        $response = $this->post('api/aptitudes/'.$aptitud->id, $aptitud->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteAptitud()
    {
        $response = $this->call('DELETE', 'api/aptitudes/'.$aptitud->id);
        $response->assertStatus(200);
    }
}
