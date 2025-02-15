<?php

namespace App\Services;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartService
{
    /**
     * Haalt de huidige winkelwagen op
     * Voor ingelogde gebruikers: haalt items op uit de database
     * Voor gasten: haalt items op uit de sessie
     */
    public function getCart()
    {
        if (Auth::check()) {
            return CartItem::where('user_id', Auth::id())
                ->pluck('quantity', 'product_id')
                ->toArray();
        }
        return Session::get('cart', []);
    }

    /**
     * Haalt alle producten op die in de winkelwagen zitten
     * Koppelt de juiste hoeveelheid aan elk product
     * Geeft een collectie terug met product objecten en hun hoeveelheden
     */
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

    /**
     * Voegt een product toe aan de winkelwagen
     * Voor ingelogde gebruikers: slaat op in database
     * Voor gasten: slaat op in sessie
     * Als product al bestaat wordt de hoeveelheid verhoogd
     */
    public function addToCart($productId)
    {
        if (Auth::check()) {
            $cartItem = CartItem::firstOrNew([
                'user_id' => Auth::id(),
                'product_id' => $productId
            ]);
            $cartItem->quantity = ($cartItem->quantity ?? 0) + 1;
            $cartItem->save();
        } else {
            $cart = $this->getCart();
            $cart[$productId] = ($cart[$productId] ?? 0) + 1;
            $this->updateCart($cart);
        }
    }

    /**
     * Update de hoeveelheid van een product in de winkelwagen
     * Als hoeveelheid 0 is wordt het product verwijderd
     * Werkt voor zowel database als sessie opslag
     */
    public function updateQuantity($productId, $quantity)
    {
        if (Auth::check()) {
            if ($quantity > 0) {
                CartItem::updateOrCreate(
                    ['user_id' => Auth::id(), 'product_id' => $productId],
                    ['quantity' => $quantity]
                );
            } else {
                $this->removeFromCart($productId);
            }
        } else {
            $cart = $this->getCart();
            if ($quantity > 0) {
                $cart[$productId] = $quantity;
            } else {
                unset($cart[$productId]);
            }
            $this->updateCart($cart);
        }
    }

    /**
     * Verwijdert een product uit de winkelwagen
     * Werkt voor zowel database als sessie opslag
     */
    public function removeFromCart($productId)
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
        } else {
            $cart = $this->getCart();
            unset($cart[$productId]);
            $this->updateCart($cart);
        }
    }

    /**
     * Telt het totaal aantal items in de winkelwagen
     * Telt de hoeveelheden van alle producten bij elkaar op
     */
    public function getItemCount()
    {
        return array_sum($this->getCart());
    }

    /**
     * Berekent het subtotaal van de winkelwagen
     * Vermenigvuldigt de prijs van elk product met de hoeveelheid
     * en telt alles bij elkaar op
     */
    public function getSubtotal()
    {
        return $this->getCartItems()->sum(function ($item) {
            return $item['product']->price * $item['quantity'];
        });
    }

    /**
     * Kopieert de winkelwagen van een gast naar de database
     * wanneer deze inlogt
     * Wordt aangeroepen bij het inloggen
     */
    public function mergeGuestCartWithUserCart()
    {
        if (!Auth::check()) return;

        $sessionCart = Session::get('cart', []);
        foreach ($sessionCart as $productId => $quantity) {
            CartItem::updateOrCreate(
                ['user_id' => Auth::id(), 'product_id' => $productId],
                ['quantity' => $quantity]
            );
        }
        Session::forget('cart');
    }

    /**
     * Private hulpmethode om de sessie winkelwagen bij te werken
     * Wordt alleen intern gebruikt voor gast gebruikers
     */
    private function updateCart($cart)
    {
        Session::put('cart', $cart);
    }
}
