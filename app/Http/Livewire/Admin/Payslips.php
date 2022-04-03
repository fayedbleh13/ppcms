<?php

namespace App\Http\Livewire\Admin;

use App\Exports\PayslipsExport;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\EmployeeDeduction;
use App\Models\Payroll;
use App\Models\PayrollItem;
use PDF;
use Carbon\Carbon;
use Livewire\Component;
use DB;
use Excel;



class Payslips extends Component
{
    public $payroll_type;
    public $payroll_id;
    public $emp_id;
    public $working_days;
    public $payroll_status;
 
    

    public function export($payroll_id)
    {
       
        // $employee = Employee::where('id', $payroll_item->emp_id);
        $payroll = Payroll::where('id', $payroll_id)->first();
        $emp_ded = EmployeeDeduction::where('emp_id', '=', $payroll->emp_id)->first();
        $pi = PayrollItem::where('payroll_id',  $payroll_id)->first();
        $emp_code = $pi->employee->employee_id;

        $data = [
            'employee_id' => $pi->employee->employee_id,
            'name' => $pi->employee->name,
            'job_type' => $pi->employee->job_type,
            'gender' => $pi->employee->gender,
            'mobile' => $pi->employee->mobile,
            'email' => $pi->employee->email,
            'daily_rate' => $pi->employee->salary_rate,
            'payroll_status' => $pi->payroll->payroll_status,
            'date_issued' => $pi->created_at,
            'reference_no' => $pi->payroll->reference_id,
            'bonus' => $pi->payroll->bonus,
            'salary' => $pi->payroll->salary,
            'late' => $pi->payroll->late,
            'absences' => $pi->payroll->absences,
            'sss' => $pi->payroll->sss,
            'philhealth' => $pi->payroll->philhealth,
            'pag_ibig' => $pi->payroll->pagibig,
            'overtime_hrs' => $pi->payroll->overtime_hrs,
            'date_from' => $pi->payroll->date_from,
            'date_to' => $pi->payroll->date_to,
            'overtime_amount' => $pi->overtime,
            'late_amount' => $pi->late_amount,
            'absences_amount' => $pi->absences_amount,
            'gross_salary' => $pi->gross_salary,
            'net_salary'=> $pi->net_salary,
            'overtime' => $pi->overtime,
            'total_deductions' => $pi->total_deductions,
            'leave_amount' => $pi->leave_amount,
            
        ];

        view()->share('data', $data);
        
        $pdfContent = PDF::loadView('livewire.admin.payslip-details', $data)->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "payslip". $emp_code.".pdf"
        );

        // return (new PayslipsExport($payroll_id))->download('payslips.pdf');
        // return Excel::download(new PayslipsExport, 'payslips.pdf');
        // return (new PayslipsExport)->download('payslips.pdf', Excel::MPDF);  
        
    }
    
    public function render()
    {
        $payslips = Payroll::all();
        $employee = Employee::all();
        
        return view('livewire.admin.payslips', ['payslips' => $payslips])->layout('layouts.admin');
    }
}
