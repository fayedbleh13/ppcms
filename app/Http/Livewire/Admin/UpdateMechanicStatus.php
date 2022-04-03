<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use Livewire\Component;

class UpdateMechanicStatus extends Component
{
    public $mechanic;
    public $emp_id;
    
    public function updateMechanicStatus()
    {
        $emp = Employee::where('id', $this->mechanic)->first();
        $emp->id = $this->mechanic;
        $emp->mechanic_status = 0;
        $emp->save();
        session()->flash('msg', 'Updated succesfully');
    }

    public function render()
    {
        $employees = Employee::all();
        return view('livewire.admin.update-mechanic-status', ['employees' => $employees])->layout('layouts.admin');
    }
}
