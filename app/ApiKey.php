<?php

namespace App;

use App\Enums\ApiKeyStatuses;
use App\Enums\ClientSources;
use App\Jobs\SendQueuedLinks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ApiKey extends Model
{
    use DispatchesJobs;

    protected $table = 'api_keys';
    protected $guarded = ['id'];
    protected $hidden = ['id', 'email_check', 'email_retries', 'created_at', 'updated_at'];

    public static function isValid($uuid)
    {
        $uuidObject = self::whereUuid($uuid)->first();

        return ($uuidObject && $uuidObject->status === ApiKeyStatuses::OK);
    }

    public function queuedLinks()
    {
        return $this->hasMany(QueuedLink::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function sendQueuedLinks()
    {
        if (!count($this->queuedLinks)) {
            return;
        }

        dispatch(new SendQueuedLinks($this, $this->queuedLinks));
    }

    public static function canBypassVerificationCode($source)
    {
        return $source === ClientSources::IOS;
    }
}