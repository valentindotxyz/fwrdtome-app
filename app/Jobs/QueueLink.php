<?php

namespace App\Jobs;

use App\ApiKey;
use App\QueuedLink;
use App\Utils\Utils;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class QueueLink implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $apiKey, $link, $title, $preview;

    public function __construct(ApiKey $apiKey, string $link, bool $preview)
    {
        $this->apiKey = $apiKey;
        $this->link = $link;
        $this->preview = $preview;
    }

    public function handle()
    {
        // Retrieve the website's thumbnail…
        $thumbnail = "";
        if ($this->preview) {
            $thumbnail = Utils::getWebsiteThumbnail($this->link);
        }

        QueuedLink::create([
            'api_key_id' => $this->apiKey->id,
            'title' => Utils::getWebsiteTitle($this->link),
            'link' => $this->link,
            'thumbnail' => $thumbnail
        ]);
    }
}
