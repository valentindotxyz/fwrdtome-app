<?php

namespace App\Http\Controllers;

use App\ApiKey;
use App\Jobs\SendLink;
use Illuminate\Http\Request;

class LegacyController extends Controller
{
    public function send(Request $request)
    {
        if (!$request->has(['api', 'url'])) {
            return response()->json("Missing data", 422);
        }

        /** @var ApiKey $apiKey */
        $apiKey = ApiKey::where('uuid', $request->get('api'))->first();

        if (!$apiKey) {
            return response()->json("Invalid API key", 401);
        }

        $this->dispatch(new SendLink($apiKey, $request->get('url'), false, false));
    }
}
