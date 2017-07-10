<?php

Route::post('/register', 'ApiController@register');
Route::middleware('check.apiKey')->get('/check', 'ApiController@check');
Route::middleware('check.apiKey')->post('/update', 'ApiController@update');
Route::middleware('check.beforeSend')->any('/send', 'ApiController@send');
