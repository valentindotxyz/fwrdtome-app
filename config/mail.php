<?php

return [
	'driver' => env('MAIL_DRIVER', 'smtp'),
	'host' => env('MAIL_HOST', 'localhost'),
	'port' => env('MAIL_PORT', 25),
	'from' => ['address' => env('MAIL_FROM'), 'name' => env('MAIL_FROM_NAME')],
	'username' => env('MAIL_USERNAME'),
	'password' => env('MAIL_PASSWORD'),
	'sendmail' => '/usr/sbin/sendmail -bs',
];