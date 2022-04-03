<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use App\Models\PayrollItem;
use Livewire\Component;

class PayslipDetails extends Component
{
    public $emp_id;
    public $payroll_id;

    public function render()
    {
        
        $employees = Employee::all();
        return view('livewire.admin.payslip-details', ['employees' => $employees])->layout('layouts.admin');
    }
}
