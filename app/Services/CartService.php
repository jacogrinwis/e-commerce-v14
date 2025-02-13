<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function getCart()
    {
        return Session::get('cart', []);
    }

    public function getCartItems()
    {
        $cart = $this->getCart();
        return Product::whereIn('id', array_keys($cart))
            ->get()
            ->map(function ($product) use ($cart) {
                return [
                    'product' => $product,
                    'quantity' => $cart[$product->id]
                ];
            });
    }

    public function addToCart($productId)
    {
        $cart = $this->getCart();
        if (!isset($cart[$productId])) {
            $cart[$productId] = 1;
        } else {
            $cart[$productId]++;
        }
        $this->updateCart($cart);
    }

    public function removeFromCart($productId)
    {
        $cart = $this->getCart();
        unset($cart[$productId]);
        $this->updateCart($cart);
    }

    public function updateQuantity($productId, $quantity)
    {
        $cart = $this->getCart();
        if ($quantity > 0) {
            $cart[$productId] = $quantity;
        } else {
            unset($cart[$productId]);
        }
        $this->updateCart($cart);
    }

    public function getItemCount()
    {
        return array_sum($this->getCart());
    }

    public function getSubtotal()
    {
        return $this->getCartItems()->sum(function ($item) {
            return $item['product']->price * $item['quantity'];
        });
    }

    private function updateCart($cart)
    {
        Session::put('cart', $cart);
    }
}
