<?php

namespace App\Http\Livewire\User;

use App\Models\Booking;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CurrentBookings extends Component
{
    public $booking_status;
    public $booking_id;
    public $user_id;
    public $service_id;
    
    public function openCancelBookModal($id)
    {
        $book = Booking::where('id',$id)->first();
        $this->booking_id = $id;
        $this->booking_status = $book->booking_status;
        
        // dd($book->booking_id );
        $this->dispatchBrowserEvent('openCancelBookModal', ['id' => $id]);
    }

    public function cancelBookingStatus(){
        $book_id = $this->booking_id;
        $cancelBook = Booking::find($book_id)->update([
            'booking_status' => 2,
          ]);
        // $cancelBook->booking_status = 2;
    
        if ($cancelBook) {
            $this->dispatchBrowserEvent('closeCancelBookModal');
        }
      }

    public function render()
    {
        $bookings = Booking::where('user_id', Auth::user()->id)->get();
        $ord = Order::where('user_id', Auth::user()->id)->first();
        return view('livewire.user.current-bookings', ['bookings' => $bookings, 'ord' => $ord])->layout('layouts.app');
    }
}
