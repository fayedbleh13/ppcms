<?php

namespace App\Http\Livewire\Admin;

use App\Models\Allowance;
use App\Models\Deduction;
use App\Models\Employee;
use App\Models\EmployeeDeduction;
use App\Models\Leave;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EmployeeDetails extends Component
{
    public $emp_id;
    public $leave_id;
    public $emp;
    public $deduction_id;
    public $type, $amount;

    public function mount($emp_id)
    {
        $employees = Employee::find($emp_id);
        $this->emp_id = $employees->id;
    }

    public function openAddDeductionModal()
    {
        $this->amount = '';
        $this->dispatchBrowserEvent('openAddDeductionModal');
    }

    public function addDeduction()
    {
        $emp_deduction = new EmployeeDeduction();
        $emp_deduction->emp_id = $this->emp_id; 
        $emp_deduction->deduction_id = $this->deduction_id;
        $emp_deduction->type = $this->type;
        $emp_deduction->amount = $this->amount;
        $emp_deduction->save();
        session()->flash('deduction', 'Deduction added successfully');

        if ($emp_deduction) 
        {
            $this->dispatchBrowserEvent('closeAddDeductionModal');
        }
    }

    public function render()
    {
        $deduction = Deduction::all();
        $emp_deduction = EmployeeDeduction::where('emp_id', '=', $this->emp_id)->get();
        $employees = Employee::find($this->emp_id);
    
        return view('livewire.admin.employee-details', ['employees' => $employees, 'deduction' => $deduction, 'emp_deduction' => $emp_deduction])->layout('layouts.admin');
    }
}
