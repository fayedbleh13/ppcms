<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use App\Models\Payroll;
use Livewire\Component;

class EditPayslip extends Component
{
    public $date_from;
    public $date_to;
    public $payroll_type;
    public $payroll_id;
    public $yesOvertime, $yesHoliday, $yesBonus;
    public $payroll_status, $bonus, $holiday, $overtime_hrs, $late, $absences, $thirth_monthpay, $working_days, $emp_id;
    
    public function mount($payroll_id)
    {
        $payslip = Payroll::find($this->payroll_id);
        $this->date_from = $payslip->date_from;
        $this->date_to = $payslip->date_to;
        $this->payroll_type = $payslip->payroll_type;
        $this->payroll_id = $payslip->id;
        $this->emp_id = $payslip->emp_id;
        $this->working_days = $payslip->working_days;
        $this->late = $payslip->late;
        $this->absences = $payslip->absences;
        $this->thirth_monthpay = $payslip->thirth_monthpay;
        $this->overtime_hrs = $payslip->overtime_hrs;
        $this->holiday = $payslip->holiday;
        $this->bonus = $payslip->bonus;
        $this->payroll_status = $payslip->payroll_status;
    }
    public function updatePayslip()
    {
        $payslip = Payroll::find($this->payroll_id);
        $payslip->emp_id = $this->emp_id;
        $payslip->date_from = $this->date_from;
        $payslip->date_to = $this->date_to;
        $payslip->working_days = $this->working_days;
        $payslip->late = $this->late;
        $payslip->thirth_monthpay = $this->thirth_monthpay;
        $payslip->absences = $this->absences;
        $payslip->overtime_hrs = $this->overtime_hrs; 
        $payslip->holiday = $this->holiday;
        $payslip->bonus = $this->bonus;
        $payslip->payroll_status = $this->payroll_status;
        $payslip->save();
        session()->flash('payslip', 'Payslip updated successfully!');
    }

    public function render()
    {
        $employee = Employee::all();
        return view('livewire.admin.edit-payslip', ['employee' => $employee])->layout('layouts.admin');
    }
}
