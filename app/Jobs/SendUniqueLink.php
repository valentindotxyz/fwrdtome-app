<?php

namespace App\Jobs;

use App\ApiKey;
use App\Log;
use App\Mail\UniqueLinkSent;
use App\Utils\Utils;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendUniqueLink implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $apiKey, $link, $preview;

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

        $title = Utils::getWebsiteTitle($this->link);

        // Send the link by email...
        Mail::to($this->apiKey->email)
            ->send(
                new UniqueLinkSent(
                    $title,
                    $this->link,
                    $thumbnail
                )
            );

        // Log the link (for legal purposes only)…
        Log::create([
            'api_key_id' => $this->apiKey->id,
            'title' => $title,
            'link' => $this->link,
            'thumbnail' => $thumbnail
        ]);
    }
}
