<?php

namespace App\Jobs;

use App\ApiKey;
use App\Enums\ApiKeyStatuses;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Ramsey\Uuid\Uuid;

class CreateApiKey
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $source;

    public function __construct(string $email, string $source)
    {
        $this->email = $email;
        $this->source = $source;
    }

    public function handle()
    {
        $verificationCode = Uuid::uuid4()->toString();

        $apiKey = ApiKey::where('email', $this->email)
            ->where('source', $this->source)
            ->first();

        if ($apiKey) {
            $apiKey->email_retries++;

            if ($apiKey->email_retries < 3) {
                $apiKey->email_check = $verificationCode;
            }

            $apiKey->save();
        } else {
            $apiKey = ApiKey::create([
                'email' => $this->email,
                'email_check' => $verificationCode,
                'source' => $this->source,
                'uuid' => Uuid::uuid4()->toString(),
                'status' => ApiKey::canBypassVerificationCode($this->source) ? ApiKeyStatuses::OK : ApiKeyStatuses::NEED_CHECK
            ]);
        }

        if (!ApiKey::canBypassVerificationCode($this->source) && $apiKey->email_retries < 3) {
            dispatch(new SendVerificationCode($apiKey, $verificationCode));
        }

        return $apiKey;
    }
}
