<?php

namespace App\Http\Livewire\Delivery;

use App\Models\Order;
use Livewire\Component;

class DeliveryOrderHistory extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.delivery.delivery-order-history', ['orders' => $orders])->layout('layouts.delivery');
    }
}
