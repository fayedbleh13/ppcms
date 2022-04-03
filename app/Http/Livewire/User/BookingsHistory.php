<?php

namespace App\Http\Livewire\User;

use App\Models\Booking;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class BookingsHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        
        $bookings = Booking::where('user_id', Auth::user()->id)->paginate(5);
        $ord = Order::where('user_id', Auth::user()->id)->first();

        return view('livewire.user.bookings-history', ['bookings' => $bookings, 'ord' => $ord])->layout('layouts.app');
    }
}
