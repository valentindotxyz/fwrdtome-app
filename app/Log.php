<?php

namespace App;

use App\Enums\Configurations;
use App\Utils\Utils;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $guarded = ['id'];

    /**
     * Tells if GLOBAL sending quota has been exceeded…
     * @return bool
     */
    public static function sendingQuotaExceeded()
    {
        return self::where('created_at', '>=', Carbon::today()->toDateString())
            ->count() >= intval(Utils::getConfigurationValueForKey(Configurations::MAX_SEND));
    }
}
