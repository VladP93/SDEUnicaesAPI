<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\AreaLaboral;

$arealaboral = new AreaLaboral;

class AreasLabolaresTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAreaLaboral()
    {
        $response = $this->get('api/areaslaborales');

        $response->assertStatus(200);
    }

    public function testPostAreaLaboral()
    {
        $arealaboral->idarea = -1;
        $arealaboral->area = "Area_test_post";

        $response = $this->post('api/areaslaborales', $arealaboral->toArray());
        $response->assertStatus(200);
    }

    public function testPutAreaLaboral()
    {
        $arealaboral->area = "Area_test_put";

        $response = $this->post('api/areaslaborales/'.$arealaboral->idarea, $arealaboral->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteAreaLaboral()
    {
        $response = $this->call('DELETE', 'api/areaslaborales/'.$arealaboral->idarea);
        $response->assertStatus(200);
    }
}
