<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;


class RequestCancel extends Component
{
    public $booking_id;
    public $booking_status;


    public function mount($booking_id){
        $booking = Booking::find($booking_id);
        $this->booking_id = $booking->id;
        $this->booking_status = $booking->booking_status;
    }

    public function cancelBooking(){

        $booking = Booking::find($this->booking_id);
        $booking->booking_status = 2;
        $booking->save();
        session()->flash('msg', 'Cancel booking ruest sent!');
    }

    public function render()
    {
        return view('livewire.admin.request-cancel')->layout('layouts.admin');
    }
}
