<?php

namespace App\Jobs;

use App\ApiKey;
use App\Log;
use App\Mail\MailUniqueLink;
use App\QueuedLink;
use App\Utils\Utils;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendLink implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $apiKey, $link, $title, $preview, $queued;

    public function __construct(ApiKey $apiKey, string $link, string $title, bool $preview, bool $queued)
    {
        $this->apiKey = $apiKey;
        $this->link = $link;
        $this->title = $title;
        $this->preview = $preview;
        $this->queued = $queued;
    }

    public function handle()
    {
        // Retrieve the website's thumbnail…
        $thumbnail = "";
        if ($this->preview) {
            $thumbnail = Utils::getWebsiteThumbnail($this->link);
        }

        // Retrieved the website's title…
        $title = $this->title !== "NONE" ? $this->title : Utils::getWebsiteTitle($this->link);

        if ($this->queued) {
            QueuedLink::create([
                'api_key_id' => $this->apiKey->id,
                'title' => $title,
                'link' => $this->link,
                'thumbnail' => $thumbnail
            ]);
        } else {
            // Send the link by email...
            Mail::to($this->apiKey->email)->send(new MailUniqueLink($title, $this->link, $thumbnail));

            // Log the link (for legal purposes only)…
            Log::create([
                'api_key_id' => $this->apiKey->id,
                'title' => $title,
                'link' => $this->link,
                'thumbnail' => $thumbnail
            ]);

            \Illuminate\Support\Facades\Log::info("[APP] Link sent: " . $this->link);
        }
    }
}
