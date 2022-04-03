<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CurrentOrders extends Component
{
    
    public function render()
    {
        $orders = Order::OrderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->paginate(5);

        // $checkStatus = Order::find(Auth::user()->id);
        $ord = Order::where('user_id', Auth::user()->id)->first();

        return view('livewire.user.current-orders', ['orders' => $orders, 'ord' => $ord])->layout('layouts.app');
    }
}
