<?php

use Illuminate\Http\Request;

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
    return $request->input('hook');
});