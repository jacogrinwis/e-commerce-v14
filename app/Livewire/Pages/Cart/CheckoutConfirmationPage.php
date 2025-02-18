<?php

namespace App\Livewire\Pages\Cart;

use App\Models\Order;
use Livewire\Component;
use App\Mail\NewOrderMail;
use Illuminate\Support\Facades\Mail;

/**
 * Component voor de bestellingsbevestigingspagina
 * Toont orderdetails en verstuurt bevestigingsmail naar beheerder
 */
class CheckoutConfirmationPage extends Component
{
    /**
     * De bestelling die zojuist is geplaatst
     * Automatisch geïnjecteerd via route model binding
     */
    public Order $order;

    /**
     * Initialiseert het component
     * Wordt uitgevoerd bij het laden van de pagina
     * 
     * @param Order $order De bestelling uit de database
     */
    public function mount(Order $order)
    {
        // Sla order op in component voor weergave
        $this->order = $order;

        // Verstuur bevestigingsmail naar beheerder
        // Dit gebeurt na de redirect, dus vertraagt de checkout niet
        Mail::to(config('mail.admin_address'))->send(new NewOrderMail($order));

        // Redirect na 5 seconden
        // sleep(5);
        // return redirect()->route('home');
    }

    /**
     * Rendert de bevestigingspagina
     * Toont ordergegevens aan de klant
     */
    public function render()
    {
        return view('livewire.pages.cart.checkout-confirmation-page');
    }
}
