<?php

namespace App\Livewire\Pages\User;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrdersPage extends Component
{
    public function render()
    {
        $orders = Order::query()
            ->when(Auth::check(), function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->with(['orderItems.product'])
            ->latest()
            ->get();

        return view('livewire.pages.account.orders-page', [
            'orders' => $orders
        ]);
    }
}
