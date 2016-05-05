<?php

namespace App\Mailers;

use Illuminate\Support\Facades\Mail;

class Mailer
{
	public static function sendRegister($email, $emailVerificationCode)
	{
		Mail::send('emails.register', ['verificationCode' => $emailVerificationCode], function ($m) use ($email) {
			$m->to($email, $email)->subject("Activate your Fwrdto.me account!");
		});
	}

	public static function sendLink($email, $url, $title)
	{
		Mail::send('emails.send', ['url' => $url, 'title' => $title], function ($m) use ($email, $title) {
			$m->to($email, $email)->subject($title);
		});
	}
}