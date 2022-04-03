<?php

namespace App\Http\Livewire\Admin;

use App\Models\Leave;
use App\Models\Employee;
use Livewire\Component;

class EditLeave extends Component
{
    public $emp_id;
    public $date_from;
    public $date_to;
    public $status;
    public $reason;
    public $leave_id;

    public function mount($leave_id){
        $leave = Leave::find($leave_id);
        $this->emp_id = $leave->emp_id;
        $this->date_from = $leave->date_from;
        $this->date_to = $leave->date_to;
        $this->status = $leave->status;
        $this->reason = $leave->reason;
        $this->leave_id = $leave->id;
    }

    public function updateLeave(){
        $leave = Leave::find($this->leave_id);
        $leave->emp_id = $this->emp_id;
        $leave->date_from = $this->date_from;
        $leave->date_to = $this->date_to;
        $leave->status = $this->status;
        $leave->reason = $this->reason;
        $leave->save();
        session()->flash('leave', 'Leave  updated succesfully');

    }

    public function render()
    {
        $emp = Employee::all();
        return view('livewire.admin.edit-leave', ['emp' => $emp])->layout('layouts.admin');
    }
}
