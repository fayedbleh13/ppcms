<?php

namespace App\Http\Livewire\Admin;

use App\Models\Attendance;
use Livewire\Component;
use App\Models\Employee;

class EditAttendance extends Component
{
    public $emp_id;
    public $time_in;
    public $time_out;
    public $attendance_id;

    public function mount($attendance_id){
        $attendance = Attendance::find($attendance_id);
        $this->emp_id = $attendance->emp_id;
        $this->time_in = $attendance->time_in;
        $this->time_out = $attendance->time_out;
        $this->attendance = $attendance->id;
    }

    public function updateTimeRecord(){
        $attendance = Attendance::find($this->attendance_id);
        $attendance->emp_id = $this->emp_id;
        $attendance->time_in = $this->time_in;
        $attendance->time_out = $this->time_out;
        $attendance->save();
    }

    public function render()
    {
        $attendance = Attendance::find($this->attendance_id);
        $employee = Employee::all();
        return view('livewire.admin.edit-attendance', ['attendance'=>$attendance, 'employee'=>$employee])->layout('layouts.admin');
    }
}
