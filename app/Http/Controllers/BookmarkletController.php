<?php

namespace App\Http\Controllers;

use App\ApiKey;
use App\Log;
use App\Mailers\Mailer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;

class BookmarkletController extends Controller
{
    public function home()
    {
        return view('home');
    }
    
    public function register(Request $request)
    {
        if (!$request->has('email') || empty($request->get('email')))
            return redirect('/', 302, [], env('APP_HTTPS'));

        $recaptcha = new \ReCaptcha\ReCaptcha(env('APP_CAPTCHA'));
        $check = $recaptcha->verify($request->get('g-recaptcha-response'));
        if (!$check->isSuccess())
            abort(401, "Could not check spam status.");

        $apiKey = ApiKey::create([
            'email' => $request->get('email'),
            'type' => 'BOOKMARKLET',
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'status' => 'OK'
        ]);

        return redirect('/bookmarklet/' . $apiKey->uuid, 302, [], env('APP_HTTPS'));
    }

    public function getBookmarklet($apiKey)
    {
        if (!ApiKey::isValid($apiKey))
            abort(401, 'Invalid API key');

        return view('bookmarklet')->with('apiKey', $apiKey);
    }

    public function confirm(Request $request, $verificationCode)
    {
        $apiKey = ApiKey::where('email_check', $verificationCode)->first();

        if (!$apiKey)
            abort(401, "Wrong verification code");

        $apiKey->status = 'OK';
        $apiKey->save();

        return view('confirmation_chrome');
    }

    public function sendWithAJAX(Request $request)
    {
        if (!$request->has('apiKey'))
            abort(401, 'Missing API key');

        if (!ApiKey::isValid($request->get('apiKey')))
            abort(401, 'Invalid API key');

        if (!$request->has('url'))
            abort(401, 'Missing URL');

        $apiKey = ApiKey::where('uuid', $request->get('apiKey'))->first();

        try {
            Mailer::sendLink($apiKey->email, $request->get('url'), $request->get('title'));
        } catch (Exception $e) {
            abort(400, $e->getMessage());
        }

        Log::create(['ip' => $request->ip(), 'url' => $request->get('url'), 'title' => $request->get('title'), 'api_key' => $apiKey->id]);

        return response()->json("Link sent");
    }

    public function sendWithImage(Request $request)
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

        header( "Content-type: image/gif");
        header( "Expires: Wed, 5 Feb 1986 06:06:06 GMT");
        header( "Cache-Control: no-cache");
        header( "Cache-Control: must-revalidate");

        printf ('%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%c%', 71,73,70,56,57,97,1,0,1,0,128,255,0,192,192,192,0,0,0,33,249,4,1,0,0,0,0,44,0,0,0,0,1,0,1,0,0,2,2,68,1,0,59);
    }
}
