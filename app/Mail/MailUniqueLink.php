<?php

namespace App\Mail;

use DateTime;
use DateTimeZone;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailUniqueLink extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $title;
    public $link;
    public $thumbnail;
    public $sentDate;

    public function __construct(string $title, string $link, string $thumbnail)
    {
        $this->title = $title;
        $this->link = $link;
        $this->thumbnail = $thumbnail;
        $this->sentDate = new DateTime('now', new DateTimeZone('UTC'));
    }

    public function build()
    {
        return $this->subject($this->title)
            ->view('emails.unique-link');
//            ->text('emails.unique-link_plain');
    }
}
