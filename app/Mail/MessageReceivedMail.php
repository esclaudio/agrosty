<?php

namespace App\Mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use App\Models\Message;

class MessageReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $m;

    /**
     * Create a new message instance.
     */
    public function __construct(Message $m)
    {
        $this->m = $m;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject($this->m->subject->desc)
            ->text('emails.messages.received');
    }
}
