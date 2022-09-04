<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $ip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $ip)
    {
        //
        $this->details = $details;
        $this->ip= $ip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->details['email'])
            ->subject('Nouveau message de Guilderz.xyz')
            ->view('emails.contact');
    }
}
