<?php

namespace App;

use App\Enums\ApiKeyStatuses;
use App\Enums\ClientSources;
use App\Enums\Configurations;
use App\Jobs\SendQueuedLinks;
use App\Utils\Utils;
use Carbon\Carbon;
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

    public static function canBypassVerificationCode($source)
    {
        return $source === ClientSources::IOS;
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

    /**
     * Tells if API_KEY sending quota has been exceeded…
     * @return bool
     */
    public function sendingQuotaExceeded()
    {
        return Log::where([
            ['api_key_id', '=', $this->id],
            ['created_at', '>=', Carbon::today()->toDateString()]
        ])->count() >= Utils::getConfigurationValueForKey(Configurations::MAX_SEND_PER_ACCOUNT);
    }
}