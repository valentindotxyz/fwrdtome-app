<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationCodeSent extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $verificationCode;

    public function __construct(string $verificationCode)
    {
        $this->verificationCode = $verificationCode;
    }

    public function build()
    {
        return $this->subject("Activate your account on " . env('APP_NAME'))
            ->view('emails.confirm-email')
            ->text('emails.confirm-email_plain');
    }
}
