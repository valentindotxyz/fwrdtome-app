<?php

Route::get('/', 'WebController@home');
Route::get('/test', function(Request $request) {
    dd(\App\Utils\Utils::getWebsiteThumbnail("https://medium.com"));
});
Route::get('/get-for-all-browser', 'WebController@getGetForAllBrowsers');
Route::post('/get-for-all-browser', 'WebController@postGetForAllBrowsers');
Route::get('/confirm-email-address', 'WebController@getConfirmEmailAddress');
Route::get('/confirm-email-address/{verificationCode}', 'WebController@getConfirmEmailAddressWithVerificationCode');

// v1 legacy routes...
Route::get('/send2', 'LegacyController@send');
Route::post('/chrome/send', 'LegacyController@send');
