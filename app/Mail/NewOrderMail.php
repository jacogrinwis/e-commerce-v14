<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

/**
 * Mailable klasse voor het versturen van nieuwe bestelling notificaties
 * Deze e-mail wordt verzonden wanneer er een nieuwe bestelling is geplaatst
 */
class NewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Maakt een nieuwe instantie van de mail aan
     * 
     * @param Order $order De bestelling waarvoor de mail wordt verstuurd
     */
    public function __construct(public Order $order) {}

    /**
     * Definieert de envelope van het e-mailbericht
     * Stelt het onderwerp en de afzender in
     * 
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nieuwe bestelling #' . $this->order->order_number,
            from: new Address('jacogrinwis@gmail.com', 'Webshop'),
        );
    }

    /**
     * Definieert de inhoud van het e-mailbericht
     * Koppelt de view en geeft de benodigde data door
     * 
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new-order',
            with: ['order' => $this->order]
        );
    }

    /**
     * Definieert eventuele bijlagen voor het e-mailbericht
     * 
     * @return array Lijst met bijlagen
     */
    public function attachments(): array
    {
        return [];
    }
}
