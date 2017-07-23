<?php

namespace Tests\Feature;

use App\ApiKey;
use App\Enums\ApiKeyStatuses;
use App\Enums\ClientSources;
use App\Jobs\SendLink;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class WebTest extends TestCase
{
    public function testDisplayHomepage()
    {
        $response = $this->get("/");

        $response->assertViewIs('home');
    }

    public function testDisplayGetForAllBrowsers()
    {
        $response = $this->get("/get-for-all-browser");

        $response->assertViewIs('get-for-all-browser');
    }
}
