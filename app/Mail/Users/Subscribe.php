<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Traits\Mail\Users\CommonUserMailSettings;

class Subscribe extends Mailable
{
    use Queueable, SerializesModels, CommonUserMailSettings;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        $this->viewToRender = 'subscribe.subscribe';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for subscribing',
            from: new Address(
                address: config('mail.senders.contact.email'),
                name: config('mail.senders.contact.name')
            )
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.users.components.mail'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
