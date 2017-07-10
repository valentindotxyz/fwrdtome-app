<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueuedLink extends Model
{
    protected $table = 'queued_links';
    protected $guarded = ['id'];

    public function apiKey()
    {
        return $this->belongsTo(ApiKey::class);
    }
}
