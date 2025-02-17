<?php

namespace App\Livewire\Pages\Cart;

use App\Facades\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Mail\NewOrderMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutPage extends Component
{
    public $shippingMethod = 'pickup'; // pickup or delivery
    public $paymentMethod = 'banktransfer'; // banktransfer, tikkie, paypal
    public $shippingAddress = [
        'name' => '',
        'email' => '',
        'street' => '',
        'house_number' => '',
        'postal_code' => '',
        'city' => '',
        'phone' => ''
    ];
    public $notes;

    protected $rules = [
        'shippingMethod' => 'required|in:pickup,postnl-standard,postnl-track-trace,dhl-standard,dhl-track-trace,homerr',
        'paymentMethod' => 'required|in:banktransfer,tikkie,paypal,contant',
        'shippingAddress.name' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.email' => 'required_unless:shippingMethod,pickup|email',
        'shippingAddress.street' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.house_number' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.postal_code' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.city' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.country' => 'required_unless:shippingMethod,pickup',
        'shippingAddress.phone' => 'required_unless:shippingMethod,pickup'
    ];

    public function mount()
    {
        if (Cart::getItemCount() === 0) {
            return redirect()->route('cart.shopping-cart');
        }

        if (Auth::check()) {
            $defaultAddress = Auth::user()->addresses()->where('is_default', true)->first();

            $this->shippingAddress = [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'street' => $defaultAddress?->street ?? '',
                'house_number' => $defaultAddress?->house_number ?? '',
                'postal_code' => $defaultAddress?->postal_code ?? '',
                'city' => $defaultAddress?->city ?? '',
                'country' => $defaultAddress?->country ?? '',
                'phone' => $defaultAddress?->phone ?? ''
            ];
        }
    }

    public function createOrder()
    {
        $this->validate();

        $orderData = [
            'user_id' => Auth::id() ?? null,  // Make user_id nullable in migration
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

        $order = Order::create($orderData);

        foreach (Cart::getCartItems() as $item) {
            $order->orderItems()->create([
                'product_id' => $item['product']->id,
                'quantity' => $item['quantity'],
                'price' => $item['product']->price,
                'discount' => $item['product']->discount ?? 0,
            ]);
        }

        Mail::to('your@email.com')->send(new NewOrderMail($order));

        Cart::clear();

        return redirect()->route('cart.checkout.confirmation', $order);
    }

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
