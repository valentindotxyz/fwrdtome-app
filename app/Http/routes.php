<?php

use App\ApiKey;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

$app->get('/', function () use ($app)
{
    return view('home');
});

$app->get('/api-{apiUuid}', function($apiKey)
{
    if (!ApiKey::isValid($apiKey))
        abort(401, 'Invalid API key');

    return view('bookmarklet')->with('apiKey', $apiKey);
});

$app->post('/', function(Request $request)
{
//    $recaptcha = new \ReCaptcha\ReCaptcha(env('APP_CAPTCHA'));
//    $check = $recaptcha->verify($request->get('g-recaptcha-response'));
//    if (!$check->isSuccess())
//        abort(401, "Could not check spam status.");

    $apiKey = ApiKey::create([
        'email' => $request->get('email'),
        'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        'status' => 'OK'
    ]);

    return redirect('/api-' . $apiKey->uuid, 302, [], true);
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

// Version 1 here with AJAX (not working on all sites...)
$app->post('/send', function(Request $request) use ($app)
{
    if (!$request->has('apiKey'))
        abort(401, 'Missing API key');

    if (!ApiKey::isValid($request->get('apiKey')))
        abort(401, 'Invalid API key');

    if (!$request->has('url'))
        abort(401, 'Missing URL');

    $apiKey = ApiKey::where('uuid', $request->get('apiKey'))->first();

    try {
        // Send email to to address associated to API Key
        Mail::send('emails.send', ['url' => $request->get('url'), 'title' => $request->get('title')], function ($m) use ($apiKey, $request) {
            $m->to($apiKey->email, $apiKey->email)->subject($request->get('title'));
        });

        // Save log for legal purposes
        Log::create(['ip' => $request->ip(), 'url' => $request->get('url'), 'title' => $request->get('title'), 'api_key' => $apiKey->id]);

    } catch (Exception $e) {
        abort(400, $e->getMessage());
    }

    return response()->json("Link sent");
});

$app->get('/send2', function(Request $request) use ($app)
{
    if (!$request->has('api'))
        abort(401, 'Missing API key');

    if (!ApiKey::isValid($request->get('api')))
        abort(401, 'Invalid API key');

    if (!$request->has('url'))
        abort(401, 'Missing URL');

    $apiKey = ApiKey::where('uuid', $request->get('api'))->first();

    try {
        // Send email to to address associated to API Key
        Mail::send('emails.send', ['url' => $request->get('url'), 'title' => $request->get('title')], function ($m) use ($apiKey, $request) {
            $m->to($apiKey->email, $apiKey->email)->subject($request->get('title'));
        });

        // Save log for legal purposes
        Log::create(['ip' => $request->ip(), 'url' => $request->get('url'), 'title' => $request->get('title'), 'api_key' => $apiKey->id]);

    } catch (Exception $e) {
        abort(400, $e->getMessage());
    }

    header( "Content-type: image/gif");
    header( "Expires: Wed, 5 Feb 1986 06:06:06 GMT");
    header( "Cache-Control: no-cache");
    header( "Cache-Control: must-revalidate");

    printf ('%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%', 71,73,70,56,57,97,1,0,1,0,128,255,0,192,192,192,0,0,0,33,249,4,1,0,0,0,0,44,0,0,0,0,1,0,1,0,0,2,2,68,1,0,59);
});
