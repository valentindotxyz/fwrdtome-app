<?php

namespace App\Jobs;

use App\ApiKey;
use App\Enums\ApiKeyStatuses;
use App\Enums\ClientSources;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class UpdateEmailAddress
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $apiKey, $newEmail;

    public function __construct(ApiKey $apiKey, string $newEmail)
    {
        $this->apiKey = $apiKey;
        $this->newEmail = $newEmail;
    }

    /**
     * Update the email address' API and send a verification code if needed...
     * @return ApiKey
     */
    public function handle()
    {
        $this->apiKey->email = $this->newEmail;

        if (!ApiKey::canBypassVerificationCode($this->apiKey->source)) {
            $this->apiKey->status = ApiKeyStatuses::NEED_CHECK;
            $this->apiKey->email_check = Uuid::uuid4()->toString();
            dispatch(new SendVerificationCode($this->apiKey, $this->apiKey->email_check));
        } else {
            $this->apiKey->status = ApiKeyStatuses::OK;
        }

        $this->apiKey->save();

        return $this->apiKey;
    }
}
