<?php

namespace App\Http\Livewire\Admin;

use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Component;


class Attendances extends Component
{
    public function render()
    {

        $attendance = Attendance::all();
        return view('livewire.admin.attendances', ['attendance'=>$attendance])->layout('layouts.admin');
    }
}
