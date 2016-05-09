<?php

use App\Log;

$app->get('/', 'BookmarkletController@home');
$app->get('/confirm-email', 'BookmarkletController@confirmEmail');
$app->post('/', 'BookmarkletController@register');
$app->get('/bookmarklet/{apiUuid}', 'BookmarkletController@getBookmarklet');
$app->post('/send', 'BookmarkletController@sendWithAJAX');
$app->get('/send2', 'BookmarkletController@sendWithImage');
$app->get('confirm/{confirmationCode}', 'BookmarkletController@confirm');

$app->group(['prefix' => 'chrome'], function () use ($app) {
    $app->post('register', 'App\Http\Controllers\ChromeController@register');
    $app->post('send', 'App\Http\Controllers\ChromeController@send');
    $app->post('ping', 'App\Http\Controllers\ChromeController@ping');
});

$app->group(['prefix' => 'dashboard'], function () use ($app) {
    $app->get('/', function() {
        return view('dashboard.home');
    });
});
