<?php

use App\ApiKey;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

$app->get('/', function () use ($app) {
    // TODO
});

$app->get('/client', function (Request $request) use ($app)
{
    if (!$request->has('apiKey'))
        abort(401, 'Missing API Key');

    $response = new \Illuminate\Http\Response();
    $response->header('Content-Type', 'application/javascript');
    $response->setContent(view('client_min_js')->with('apiKey', $request->get('apiKey'))->render());
    
    return $response;
});

$app->post('/send', function(Request $request) use ($app)
{
    if (!$request->has('apiKey'))
        abort(401, 'Missing API key');

    if (!ApiKey::isValid($request->get('apiKey')))
        abort(401, 'Invalid API key');

    if (!$request->has('url'))
        abort(401, 'Missing URL');

    $apiKey = ApiKey::where('uuid', $request->get('apiKey'))->first();

    try
    {
        // Send email to to address associated to API Key
        Mail::send('emails.send', ['url' => $request->get('url'), 'title' => $request->get('title')], function ($m) use ($apiKey, $request) {
            $m->to($apiKey->email, $apiKey->email)->subject($request->get('title'));
        });

        // Save log for legal purposes
        Log::create(['ip' => $request->ip(), 'url' => $request->get('url'), 'title' => $request->get('title'), 'api_key' => $apiKey->id]);
    }
    catch (Exception $e)
    {
        abort(400, $e->getMessage());
    }

    return response()->json("Link sent");
});
