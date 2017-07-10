<?php

namespace Tests\Feature;

use App\ApiKey;
use App\Enums\ApiKeyStatuses;
use App\Enums\ClientSources;
use Tests\TestCase;

class ApiTest extends TestCase
{
    const WEBSITE = "https://medium.com/@AIDANJCASEY/guiding-principles-for-an-evolutionary-software-architecture-b6dc2cb24680";

    public function testRegisterWithoutAnyData()
    {
        $response = $this->json('POST', '/api/register');

        $response->assertStatus(422)->assertExactJson(["Missing data"]);
    }

    public function testRegisterFromChrome()
    {
        // No previous API key...
        $fakeEmail = 'fake_email_ios_' . rand(0, 100000) . '-' . rand(0, 100000) . '@doe.net';
        $previousApiKey = ApiKey::where('email', $fakeEmail)->first();
        $this->assertNull($previousApiKey);

        $response = $this->json('POST', '/api/register', [
            'email' => $fakeEmail,
            'source' => ClientSources::CHROME
        ]);

        $response->assertJsonStructure(["email", "source", "uuid", "status"]);
        $response->assertJsonFragment(["email" => $fakeEmail, "status" => ApiKeyStatuses::NEED_CHECK]);

        // API saved in DB...
        $apiKey = ApiKey::where('email', $fakeEmail)->first();
        $this->assertNotNull($apiKey);
    }

    public function testRegisterFromIOS()
    {
        // No previous API key...
        $fakeEmail = 'fake_email_ios_' . rand(0, 100000) . '-' . rand(0, 100000) . '@doe.net';
        $previousApiKey = ApiKey::where('email', $fakeEmail)->first();
        $this->assertNull($previousApiKey);

        $response = $this->json('POST', '/api/register', [
            'email' => $fakeEmail,
            'source' => ClientSources::IOS
        ]);

        $response->assertJsonStructure(["email", "source", "uuid", "status"]);
        $response->assertJsonFragment(["email" => $fakeEmail, "status" => ApiKeyStatuses::OK, "source" => ClientSources::IOS]);

        // API saved in DB...
        $apiKey = ApiKey::where('email', $fakeEmail)->first();
        $this->assertNotNull($apiKey);
    }

    public function testUpdateFromIOS()
    {
        // No previous API key...
        $apiKey = factory(ApiKey::class)->create();
        $apiKey->status = ApiKeyStatuses::OK;
        $apiKey->save();

        $this->assertEquals(ApiKeyStatuses::OK, $apiKey->status);

        $newEmailAddress = "updated_" . rand(0, 10000) . $apiKey->email;

        $response = $this->json('POST', '/api/update?api-key=' . $apiKey->uuid, [
            'email' => $newEmailAddress
        ]);

        $response->assertJsonStructure(["email", "source", "uuid", "status"]);
        $response->assertJsonFragment(["email" => $newEmailAddress, "status" => ApiKeyStatuses::NEED_CHECK]);
    }

    public function testSendWithoutAnyData()
    {
        $response = $this->json('GET', '/api/send');

        $response->assertStatus(401)->assertExactJson(["Missing data"]);
    }

    public function testSendWithoutApiKey()
    {
        $response = $this->json('GET', '/api/send', [
            'api-key' => 'fake-key',
            'link' => self::WEBSITE
        ]);

        $response->assertStatus(403)->assertExactJson(["Invalid API key"]);
    }

    public function testSendWithoutLink()
    {
        $apiKey = factory(ApiKey::class)->create();

        $response = $this->json('GET', '/api/send', [
            'api-key' => $apiKey->uuid,
        ]);

        $response->assertStatus(401)->assertExactJson(["Missing data"]);
    }

    public function testSendFromChrome()
    {
        $apiKey = factory(ApiKey::class)->create();

        $response = $this->json('GET', '/api/send', [
            'api-key' => $apiKey->uuid,
            'link' => self::WEBSITE,
            'preview' => 'yes'
        ]);

        $response->assertStatus(200)->assertExactJson(["Link processed"]);
    }

    public function testSendQueuedFromChrome(ApiKey $apiKey = null, string $link = "")
    {
        if ($apiKey === null) {
            $apiKey = factory(ApiKey::class)->create();
        }

        // Initial queued links number for the specified API key...
        $initialCount = count($apiKey->queuedLinks);

        $response = $this->json('GET', '/api/send', [
            'api-key' => $apiKey->uuid,
            'link' => $link !== "" ? $link : self::WEBSITE,
            'queued' => 'yes',
            'preview' => 'yes'
        ]);

        // Response 200...
        $response->assertStatus(200)->assertExactJson(["Link processed"]);
    }

    public function testSendQueuedFromChromeBatch($sendQueue = true)
    {
        /** @var ApiKey $apiKey */
        $apiKey = factory(ApiKey::class)->create();

        $links = ["https://facebook.com", "https://apple.com", "https://twitter.com"];

        foreach ($links as $link) {
            $this->testSendQueuedFromChrome($apiKey, $link);
        }

        $initialLogCount = count($apiKey->logs);
        $queuedLinksCount = count($apiKey->queuedLinks);

        if (!$sendQueue) {
            return;
        }

        // Send all queued links...
        $apiKey->sendQueuedLinks();
    }

    public function testSendQueuedFromChromeBatchWithoutSending()
    {
        $this->testSendQueuedFromChromeBatch(false);
    }
}
