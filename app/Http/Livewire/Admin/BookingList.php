<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Employee;
use Auth;
use DB;

class BookingList extends Component
{

  public $booking_id;
  public $booking_status = 2;
  public $approve = 1;
  public $boooked_date;
  public $search = '';
  public $mechanic;
    
    
  public function updateBooking($id){
    $book = Booking::find($id);
    $this->booked_date = $book->booked_date;
    $this->booking_id = $book->id;
    $this->dispatchBrowserEvent('updateBookingModal', [
      'id'=>$id
    ]);
  }

  public function approveBooking($id){
    $book = Booking::find($id);
    $this->booking_id = $book->id;
    $this->dispatchBrowserEvent('approveBookingModal', [
      'id'=>$id
    ]);
  }

  public function approveBookingStatus(){
    $booking_id = $this->booking_id;
    $update =  Booking::find($booking_id)->update([
        'booking_status' => $this->approve,
        'emp_id' => $this->mechanic
    ]);

    if ($update) {
        $this->dispatchBrowserEvent('saveApprovedBookingModal');
    }
  }

  public function updateBookingStatus(){
    $booking_id = $this->booking_id;
    $update =  Booking::find($booking_id)->update([
        'booked_date' => $this->booked_date,
        'booking_status' => $this->booking_status
    ]);

    if ($update) {
        $this->dispatchBrowserEvent('saveUpdatedBookingModal');
    }
  }

  
  public function render()
  {
      $booking = Booking::all();
      $employee = Employee::where('job_type', 'mechanic')->get();
      return view('livewire.admin.booking-list', ['booking'=>$booking], ['employee'=>$employee])->layout('layouts.admin');
  }
}