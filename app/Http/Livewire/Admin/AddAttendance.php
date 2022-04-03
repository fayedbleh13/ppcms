<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;

class AddAttendance extends Component
{
    public $emp_id;
    public $time_in;
    public $time_out;
    public $posts;

    public function addAttendance(){
        $this->validate([
            'emp_id'=>'required',
            'time_in'=>'required',
        ]);

        $attendance = new Attendance();
            $attendance->emp_id = $this->emp_id;
            $attendance->time_in = $this->time_in;
            $attendance->time_out = $this->time_out;
            $attendance->save();
    }

    public function render()
    {
        $employee = Employee::all();
        return view('livewire.admin.add-attendance', ['employee'=>$employee])->layout('layouts.admin');
    }
}
