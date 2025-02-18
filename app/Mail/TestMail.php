<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

/**
 * Test Mailable klasse voor het verifiëren van e-mailfunctionaliteit
 * Deze klasse wordt gebruikt om de e-mailconfiguratie te testen
 */
class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Maakt een nieuwe instantie van de test mail aan
     */
    public function __construct() {}

    /**
     * Definieert de envelope van het test e-mailbericht
     * Stelt de afzender en het onderwerp in
     * 
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jacogrinwis@gmail.com', 'Laravel'),
            subject: 'Test Mail',
        );
    }

    /**
     * Definieert de inhoud van het test e-mailbericht
     * Koppelt de test e-mail template
     * 
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.test-email',
        );
    }

    /**
     * Definieert eventuele bijlagen voor het test e-mailbericht
     * 
     * @return array Lijst met bijlagen (standaard leeg voor test mail)
     */
    public function attachments(): array
    {
        return [];
    }
}
