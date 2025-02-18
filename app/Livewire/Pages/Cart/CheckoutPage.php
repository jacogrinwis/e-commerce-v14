<?php

namespace App\Livewire\Pages\Cart;

use App\Facades\Cart;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CheckoutPage extends Component
{
    // Standaard verzendmethode is ophalen in winkel
    public $shippingMethod = 'pickup';

    // Standaard betaalmethode is bankoverschrijving
    public $paymentMethod = 'banktransfer';

    // Array voor het verzendadres met lege standaardwaarden
    public $shippingAddress = [
        'name' => '',
        'email' => '',
        'street' => '',
        'house_number' => '',
        'postal_code' => '',
        'city' => '',
        'phone' => ''
    ];

    // ID van het geselecteerde adres uit adresboek
    public $selectedAddressId = null;

    // Verzameling van alle adressen van de gebruiker
    public $addresses;

    // Opmerkingen bij de bestelling
    public $notes;

    // Validatieregels voor het bestelformulier
    protected $rules = [
        // Verzendmethode moet één van de opgegeven opties zijn
        'shippingMethod' => 'required|in:pickup,postnl-standard,postnl-track-trace,dhl-standard,dhl-track-trace,homerr',

        // Betaalmethode moet één van de opgegeven opties zijn
        'paymentMethod' => 'required|in:banktransfer,tikkie,paypal,contant',

        // Adresvelden zijn verplicht tenzij ophalen in winkel is geselecteerd
        'shippingAddress.name' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.email' => 'required_unless:shippingMethod,pickup|email',
        'shippingAddress.street' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.house_number' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.postal_code' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.city' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.country' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.phone' => 'required_unless:shippingMethod,pickup'
    ];

    // Wordt uitgevoerd bij het laden van de component
    public function mount()
    {
        // Redirect naar winkelwagen als deze leeg is
        if (Cart::getItemCount() === 0) {
            return redirect()->route('cart.shopping-cart');
        }

        // Als gebruiker is ingelogd, laad adresgegevens
        if (Auth::check()) {
            // Haal alle adressen op van de gebruiker
            $this->addresses = Auth::user()->addresses()->get();

            // Zoek het standaardadres
            $defaultAddress = $this->addresses->where('is_default', true)->first();
            $this->selectedAddressId = $defaultAddress?->id;

            // Vul adresvelden met gegevens van de gebruiker en standaardadres
            $this->shippingAddress = [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'street' => $defaultAddress?->street ?? '',
                'house_number' => $defaultAddress?->house_number ?? '',
                'postal_code' => $defaultAddress?->postal_code ?? '',
                'city' => $defaultAddress?->city ?? '',
                'phone' => $defaultAddress?->phone ?? '',
                'country' => $defaultAddress?->country ?? ''
            ];
        }
    }

    // Wordt uitgevoerd wanneer een ander adres wordt geselecteerd
    public function updatedSelectedAddressId($value)
    {
        if ($value) {
            // Zoek het geselecteerde adres
            $address = $this->addresses->find($value);

            // Vul adresvelden met gegevens van het geselecteerde adres
            $this->shippingAddress = [
                'name' => $address->name,
                'email' => $address->email,
                'street' => $address->street,
                'house_number' => $address->house_number,
                'postal_code' => $address->postal_code,
                'city' => $address->city,
                'phone' => $address->phone,
                'country' => $address->country
            ];
        }
    }

    // Wordt uitgevoerd wanneer de verzendmethode wordt gewijzigd
    public function updatedShippingMethod()
    {
        $this->dispatch('shipping-method-changed');
    }

    // Verwerkt het plaatsen van de bestelling
    public function createOrder()
    {
        // Valideer alle ingevoerde gegevens
        $this->validate();

        // Verzamel alle bestelgegevens
        $orderData = [
            'user_id' => Auth::id() ?? null,
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'status' => 'pending',
            'shipping_method' => $this->shippingMethod,
            'payment_method' => $this->paymentMethod,
            'shipping_address' => $this->shippingMethod !== 'pickup' ? $this->shippingAddress : null,
            'shipping_cost' => $this->shippingMethod !== 'pickup' ? 4.95 : 0,
            'subtotal' => Cart::getSubtotal(),
            'discount' => Cart::getDiscount(),
            'total_amount' => Cart::getTotal() + ($this->shippingMethod !== 'pickup' ? 4.95 : 0),
            'notes' => $this->notes,
        ];

        // Maak de bestelling aan in de database
        $order = Order::create($orderData);

        // Voeg alle producten uit de winkelwagen toe aan de bestelling
        foreach (Cart::getCartItems() as $item) {
            $order->orderItems()->create([
                'product_id' => $item['product']->id,
                'quantity' => $item['quantity'],
                'price' => $item['product']->price,
                'discount' => $item['product']->discount ?? 0,
            ]);
        }

        // Maak winkelwagen leeg
        Cart::clear();

        // Redirect naar bevestigingspagina
        return redirect()->route('cart.checkout.confirmation', $order);
    }

    // Rendert de checkout pagina met alle benodigde gegevens
    public function render()
    {
        return view('livewire.pages.cart.checkout-page', [
            'cartItems' => Cart::getCartItems(),
            'subtotal' => Cart::getSubtotal(),
            'discount' => Cart::getDiscount(),
            'total' => Cart::getTotal(),
        ]);
    }
}
