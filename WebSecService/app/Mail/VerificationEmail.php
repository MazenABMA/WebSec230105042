<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $link = null;
    private $name = null;

    /**
     * Create a new message instance.
     */
    public function __construct($link, $name)
    {
        $this->link = $link;
        $this->name = $name;
    }

    /**
     * Build the message content.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verification',
            with: [
                'link' => $this->link,
                'name' => $this->name,
            ],
        );
    }

    /**
     * Optional: You can set the email subject here.
     */
    public function envelope(): \Illuminate\Mail\Mailables\Envelope
    {
        return new \Illuminate\Mail\Mailables\Envelope(
            subject: 'Verify Your Email Address'
        );
    }
}
