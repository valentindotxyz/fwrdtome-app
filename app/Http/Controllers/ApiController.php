<?php

namespace App\Http\Controllers;

use App\ApiKey;
use App\Enums\ClientSources;
use App\Jobs\CreateApiKey;
use App\Jobs\SendLink;
use App\Jobs\UpdateEmailAddress;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        if (!$request->has(['email', 'source'])) {
            return response()->json('Missing data', 422);
        }

        $apiKey = $this->dispatch(new CreateApiKey($request->get('email'), $request->get('source')));

        return $apiKey;
    }

    public function check(Request $request)
    {
        return ApiKey::where('uuid', $request->get('api-key'))->first();
    }

    public function update(Request $request)
    {
        /** @var ApiKey $apiKey */
        $apiKey = ApiKey::where('uuid', $request->get('api-key'))->first();

        if (!$request->has('email')) {
            return response()->json('Missing email address', 422);
        }

        return $this->dispatch(new UpdateEmailAddress($apiKey, $request->get('email')));
    }

    public function send(Request $request)
    {
        $apiKey = ApiKey::where('uuid', $request->get('api-key'))->first();

        $withPreview = $request->get('preview', false) === "yes";
        $shouldQueue = $request->get('queued', false) === "yes";

        $this->dispatch(new SendLink($apiKey, $request->get('link'), $withPreview, $shouldQueue));

        // Return an 1x1 pixel as the Bookmarklet uses an <img /> tag to work…
        if ($apiKey->source === ClientSources::BOOKMARKLET) {
            header('Content-Type: image/gif');

            die("\x47\x49\x46\x38\x39\x61\x01\x00\x01\x00\x90\x00\x00\xff\x00\x00\x00\x00\x00\x21\xf9\x04\x05\x10\x00\x00\x00\x2c\x00\x00\x00\x00\x01\x00\x01\x00\x00\x02\x02\x04\x01\x00\x3b");
        }

        return response()->json("Link processed");
    }
}
