<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserRedirect extends Component
{
    public function render()
    {   
        $user = Order::where('user_id', Auth::user()->id)->first();
       
        $users = User::where('id', Auth::user()->id)->first();
        
        
        return view('livewire.user.user-redirect', ['users' => $users, 'user' => $user])->layout('layouts.app');
    }
}
