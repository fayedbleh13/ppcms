<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderPlaced extends Component
{
    public function render()
    {
        $last_id = DB::getPDO()->lastInsertId();
        $order = Order::where('id', $last_id)->first();
        return view('livewire.order-placed', ['order' => $order])->layout('layouts.app');
    }
}
