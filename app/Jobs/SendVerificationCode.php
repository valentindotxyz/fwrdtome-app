<?php

namespace App\Jobs;

use App\ApiKey;
use App\Mail\ConfirmationCodeSent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendVerificationCode
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $apiKey, $verificationCode;

    public function __construct(ApiKey $apiKey, string $verificationCode)
    {
        $this->apiKey = $apiKey;
        $this->verificationCode = $verificationCode;
    }

    public function handle()
    {
        Mail::to($this->apiKey->email)->send(new ConfirmationCodeSent($this->verificationCode));
    }
}
