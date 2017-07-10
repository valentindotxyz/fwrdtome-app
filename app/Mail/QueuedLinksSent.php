<?php

namespace App\Mail;

use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class QueuedLinksSent extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $links;

    public function __construct(Collection $links)
    {
        $this->links = $links;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dateTime = new DateTime();

        $return = $this->subject("Your links for " . $dateTime->format("F jS, Y"))
            ->view('emails.multiple-links')
            ->text('emails.multiple-links_plain');

        foreach ($this->links as $link) {
            $link->forceDelete();
        }

        return $return;
    }
}
