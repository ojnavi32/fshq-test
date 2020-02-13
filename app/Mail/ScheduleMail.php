<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ScheduleMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $from_email, $from_name, $to_name, $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from_email, $from_name, $to_name, $message)
    {
        $this->from_email = $from_email;
        $this->from_name = $from_name;
        $this->to_name = $to_name;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->from_email)
                ->markdown('emails.scheduled-mails');
    }
}
