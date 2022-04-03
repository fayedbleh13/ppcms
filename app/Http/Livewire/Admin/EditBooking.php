<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Employee;

class EditBooking extends Component
{
    public $booking_id;
    public $booking_status = 1;
    public $booked_date;
    public $booked_time;
    public $mechanic;
    public $name;
    public $emp_id;

    public function mount($booking_id){
        $booking = Booking::find($booking_id);
        $this->booking_id = $booking->id;
        $this->booked_date = $booking->booked_date;
    }

    public function approveBooking(){

        $booking = Booking::find($this->booking_id);
        $booking->emp_id = $this->mechanic;
        $booking->booking_status = $this->booking_status;

        $emp = Employee::find($this->mechanic);
        $emp->mechanic_status = 1;
        $booking->save();
        $emp->save();
        session()->flash('msg', 'booking approved succesfully');
    }

    public function render()
    {
        $employees = Employee::all();
        $emp = Employee::where('job_type', '=', 'mechanic')->first();
        return view('livewire.admin.edit-booking', ['employees'=>$employees, 'emp' => $emp])->layout('layouts.admin');
    }
}
