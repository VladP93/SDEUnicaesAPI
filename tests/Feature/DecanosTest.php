<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Decano;

$decano = new Decano;

class DecanoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetDecano()
    {
        $response = $this->get('api/decanos');

        $response->assertStatus(200);
    }

    public function testPostDecano()
    {
        $decano->dui = "0000000-0";
        $decano->facultad = 1;
        $decano->activo = 0;

        $response = $this->post('api/decanos', $decano->toArray());
        $response->assertStatus(200);
    }
}
