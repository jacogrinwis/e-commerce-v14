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
    public $shippingAddress = [];
    public $notes;

    protected $rules = [
        'shippingMethod' => 'required|in:pickup,delivery',
        'paymentMethod' => 'required|in:banktransfer,tikkie,paypal',
        'shippingAddress.street' => 'required_if:shippingMethod,delivery',
        'shippingAddress.city' => 'required_if:shippingMethod,delivery',
        'shippingAddress.postal_code' => 'required_if:shippingMethod,delivery',
    ];

    public function mount()
    {
        if (Cart::getItemCount() === 0) {
            return redirect()->route('cart.shopping-cart');
        }

        if (Auth::check()) {
            $this->shippingAddress = [
                'street' => Auth::user()->street,
                'city' => Auth::user()->city,
                'postal_code' => Auth::user()->postal_code,
            ];
        }
    }

    public function createOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'status' => 'pending',
            'shipping_method' => $this->shippingMethod,
            'payment_method' => $this->paymentMethod,
            'shipping_address' => $this->shippingMethod === 'delivery' ? $this->shippingAddress : null,
            'shipping_cost' => $this->shippingMethod === 'delivery' ? 4.95 : 0,
            'subtotal' => Cart::getSubtotal(),
            'discount' => Cart::getDiscount(),
            'total_amount' => Cart::getTotal() + ($this->shippingMethod === 'delivery' ? 4.95 : 0),
            'notes' => $this->notes,
        ]);

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
