<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class OrdersList extends Component
{
    public function render()
    {
        $orders = Order::all();
        return view('livewire.admin.orders-list',['orders'=>$orders])->layout('layouts.admin');
    }
}
