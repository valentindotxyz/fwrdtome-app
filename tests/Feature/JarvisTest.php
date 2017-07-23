<?php

namespace Tests\Feature;

use App\ApiKey;
use App\Enums\ApiKeyStatuses;
use App\Enums\ClientSources;
use App\Jobs\SendLink;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class JarvisTest extends TestCase
{
    public function testCannotAccessWithoutValidCredentials()
    {
        $response = $this->get("/jarvis");

        $response->assertStatus(401);
    }

    public function testCanAccessWithValidCredentials()
    {
        $response = $this->call("GET", "/jarvis", [], [], [], [
            'PHP_AUTH_USER' => env('ADMIN_USER'),
            'PHP_AUTH_PW' => env('ADMIN_PASSWORD')
        ]);

        $response->assertStatus(200);
    }
}
