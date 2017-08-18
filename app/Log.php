<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $guarded = ['id'];

    public static function getSendingCountForToday()
    {
        return self::where('created_at', '>=', Carbon::today()->toDateString())->count();
    }
}
