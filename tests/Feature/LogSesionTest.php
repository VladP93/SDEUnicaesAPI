<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Logs;

$logs = new Logs;

class LogSesionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetLogs()
    {
        $response = $this->get('api/logsesion');

        $response->assertStatus(200);
    }

    public function testPostLogs()
    {
        $logs->idLog = -1;
        $logs->loginfo = "Log_test_post";
        $logs->loguser = "0000000-0";

        $response = $this->post('api/logsesion', $logs->toArray());
        $response->assertStatus(200);
    }

    public function testPutLogs()
    {
        $logs->loginfo = "Logs_test_put";

        $response = $this->post('api/logsesion/'.$logs->idLog, $logs->toArray());
        $response->assertStatus(200);
    }

    public function testDeleteLogs()
    {
        $response = $this->call('DELETE', 'api/logsesion/'.$logs->idLog);
        $response->assertStatus(200);
    }
}
