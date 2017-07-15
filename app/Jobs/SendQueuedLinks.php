<?php

namespace App\Jobs;

use App\ApiKey;
use App\Log;
use App\Mail\MailQueuedLinks;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class SendQueuedLinks implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $apiKey, $links;

    public function __construct(ApiKey $apiKey, Collection $links)
    {
        $this->apiKey = $apiKey;
        $this->links = $links;
    }

    public function handle()
    {
        // Send the link by email...
        Mail::to($this->apiKey->email)->send(new MailQueuedLinks($this->links));

        // Log the link (for legal purposes only)…
        foreach ($this->links as $link) {
            Log::create([
                'api_key_id' => $this->apiKey->id,
                'title' => $link->title,
                'link' => $link->link,
                'thumbnail' => $link->thumbnail
            ]);

            \Illuminate\Support\Facades\Log::info("[APP] Link queued: " . $link);
        }
    }
}
