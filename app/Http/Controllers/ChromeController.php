<?php

namespace App\Http\Controllers;

use App\ApiKey;
use App\Log;
use App\Mailers\Mailer;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ChromeController extends Controller
{
    public function register(Request $request)
    {
        if (!$request->has('email'))
            abort(422, "Missing email address");

        $emailCheck = str_random(21);

        $apiKey = ApiKey::where('email', $request->get('email'))->first();
        if ($apiKey) {
            $apiKey->email_retries++;
            $apiKey->save();
        } else {
            $apiKey = ApiKey::create([
                'email' => $request->get('email'),
                'email_check' => $emailCheck,
                'type' => 'CHROME',
                'uuid' => Uuid::uuid4()->toString(),
                'status' => 'NEED_CHECK'
            ]);
        }

        if ($apiKey->email_retries <= 5)
            Mailer::sendRegister($request->get('email'), $emailCheck);

        return $apiKey;
    }

    public function send(Request $request)
    {
        if (!$request->has('api'))
            abort(401, 'Missing API key');

        if (!ApiKey::isValid($request->get('api')))
            abort(401, 'Invalid API key');

        if (!$request->has('url'))
            abort(401, 'Missing URL');

        $apiKey = ApiKey::where('uuid', $request->get('api'))->first();

        try {
            Mailer::sendLink($apiKey->email, $request->get('url'), $request->get('title'));
        } catch (Exception $e) {
            abort(400, $e->getMessage());
        }

        Log::create(['ip' => $request->ip(), 'url' => $request->get('url'), 'title' => $request->get('title'), 'api_key' => $apiKey->id]);

        return response()->json(['status' => 'success']);
    }

    public function ping(Request $request)
    {
        return ApiKey::where('uuid', $request->get('apiKey'))->first();
    }
}
