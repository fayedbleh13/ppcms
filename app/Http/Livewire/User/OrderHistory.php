<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class OrderHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $orders = Order::OrderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->paginate(5);
        $ord = Order::where('user_id', Auth::user()->id)->first();
        return view('livewire.user.order-history', ['orders' => $orders, 'ord' => $ord])->layout('layouts.app');
    }
}
