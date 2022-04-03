<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Booking;
use Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Services extends Component
{
    use LivewireAlert;

    public $booked_date;
    public $booked_time;
    public $service_id;
    public $service;

    public function mount()
    {
        $this->service = Service::all();
    }

    public function bookService()
    {
        $book = new Booking();
        $book->user_id = Auth::user()->id;
        $book->service_id = $this->service_id;
        $book->booked_date = $this->booked_date;
        $book->booked_time = $this->booked_time;
        $book->total_services = 1;
        $book->save();
        
        $this->alert('success', 'You have Successfully Scheduled an Appointment', [
            'position' => 'center'
        ]);

        
    }

    public function render()
    {
        $service = Service::all();
        return view('livewire.services', ['service'=>$service])->layout('layouts.app');
    }
}
