<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Route::get('/', 'WebController@home');
Route::get('/get-for-all-browser', 'WebController@getGetForAllBrowsers');
Route::post('/get-for-all-browser', 'WebController@postGetForAllBrowsers');
Route::get('/confirm-email-address', 'WebController@getConfirmEmailAddress');
Route::get('/confirm-email-address/{verificationCode}', 'WebController@getConfirmEmailAddressWithVerificationCode');

// v1 legacy routes…
Route::get('/send2', 'LegacyController@send');
Route::post('/chrome/send', 'LegacyController@send');

// JARVIS routes…
Route::prefix('jarvis')->middleware('auth.simple')->group(function () {
    Route::get('/', 'JarvisController@getDashboard');
});

// Github hooks…
Route::post('/gh-hooks', function(Request $request) {
    if ($request->input('pull_request.state', false) === "closed" && $request->input('pull_request.merged', false) === true) {
        // Something to do here...
    }

    return response("Roger");
});