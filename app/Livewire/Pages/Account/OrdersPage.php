<?php

namespace App\Livewire\Pages\Account;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrdersPage extends Component
{
    public function deleteOrder(Order $order)
    {
        $order->delete();
    }

    public function render()
    {
        return view('livewire.pages.account.orders-page', [
            'orders' => Auth::user()->orders()
                ->with(['orderItems.product'])
                ->latest()
                ->get()
        ]);
    }
}
