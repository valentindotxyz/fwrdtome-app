<?php

namespace App\Http\Controllers;

use App\ApiKey;
use App\Enums\ApiKeyStatuses;
use App\Enums\ClientSources;
use App\Jobs\CreateApiKey;
use App\Jobs\SendVerificationCode;
use App\Mail\ConfirmationCodeSent;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class WebController extends Controller
{
    public function home(Request $request)
    {
        return view('home');
    }

    public function getGetForAllBrowsers(Request $request)
    {
        return view('get-for-all-browser');
    }

    public function postGetForAllBrowsers(Request $request)
    {
        if (!$request->has('email') || empty($request->get('email'))) {
            return redirect('/', 302, [], env('APP_HTTPS'));
        }

        $this->dispatch(new CreateApiKey($request->get('email'), ClientSources::BOOKMARKLET));

        return redirect('/confirm-email-address', 302, [], env('APP_HTTPS'));
    }

    public function getConfirmEmailAddress(Request $request)
    {
        return view('confirm-email-address');
    }

    public function getConfirmEmailAddressWithVerificationCode(Request $request, string $verificationCode)
    {
        $apiKey = ApiKey::where('email_check', $verificationCode)->first();

        if (!$apiKey) {
            abort(401, "Invalid verification code.");
        }

        $apiKey->status = ApiKeyStatuses::OK;
        $apiKey->save();

        $options = "";
        if ($request->has('previews') && $request->get('previews') === "yes") {
            $options .= "&preview=yes";
        }
        if ($request->has('queued') && $request->get('queued') === "yes") {
            $options .= "&queued=yes";
        }

        return view('confirmation-' . $apiKey->source)
            ->with('apiKey', $apiKey->uuid)
            ->with('inputs', $request->all())
            ->with('options', $options);
    }
}
