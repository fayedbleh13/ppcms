<?php

namespace App\Http\Livewire\WalkInPos;

use App\Models\Order;
use Livewire\Component;

class TransactionDetails extends Component
{
    public  $order_id;

    public function mount($order_id)
    {
        $this->$order_id = $order_id;
    }
    
    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.walk-in-pos.transaction-details', ['order' => $order])->layout('layouts.wip-header');
    }
}
