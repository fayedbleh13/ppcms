<?php

namespace App\Http\Livewire\Delivery;

use App\Models\Order;
use Livewire\Component;

class DeliveryDashboard extends Component
{

    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.delivery.delivery-dashboard', ['orders'=>$orders])->layout('layouts.delivery');
    }
}
