<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use App\Models\Leave;
use Livewire\Component;

class AddLeave extends Component
{
    public $leave_id;
    public $emp_id;
    public $date_from;
    public $date_to;
    public $status;
    public $reason;

    public function mount(){
        $this->status = 0;
    }

    public function addLeave()
    {
        $leave = new Leave();
        $leave->date_from = $this->date_from;
        $leave->date_to = $this->date_to;
        $leave->reason = $this->reason;
        $leave->save();

        $emp = Employee::find($this->emp_id);
        $emp->leave_id = $leave->id;
        $emp->status = $this->status;
        $emp->save();
        session()->flash('leave', 'Leave assigned successfully!');
    }

    public function render()
    {
        $emp = Employee::all();
        return view('livewire.admin.add-leave', ['emp' => $emp])->layout('layouts.admin');
    }
}
