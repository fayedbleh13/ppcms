<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $sales = DB::table('orders')->sum('total');
        $users = User::where('user_type', 'USR')->count();
        $pending = Order::where('status', 'ordered')->count();
        $delivered = Order::where('status', 'delivered')->count();
        return view('livewire.admin.admin-dashboard', ['sales' => $sales, 'users' => $users, 'pending' => $pending, 'delivered' => $delivered])->layout('layouts.admin');
    }
}
