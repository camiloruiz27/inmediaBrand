<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactLeadSubmitted extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * @param array<string, string> $lead
     */
    public function __construct(
        public array $lead,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo lead desde Inmedia Brand',
            replyTo: [
                new Address($this->lead['correo_corporativo'], $this->lead['nombre_completo']),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-lead-submitted',
            with: [
                'lead' => $this->lead,
            ],
        );
    }
}
