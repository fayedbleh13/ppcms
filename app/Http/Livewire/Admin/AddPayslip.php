<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\EmployeeDeduction;
use App\Models\Payroll;
use Livewire\Component;
use App\Models\PayrollItem;
use App\Models\Service;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToArray;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Week;

class AddPayslip extends Component
{

    public $date_from;
    public $date_to;
    public $working_days;
    public $late;
    public $thirth_monthpay;
    public $absences;
    public $overtime_hrs;
    public $emp_id;
    public $payroll_status;
    public $bonus;
    public $holiday;
    public $yesOvertime;
    public $yesBonus;
    public $yesHoliday;
    public $yesMechanic;
    public $payroll_id;
    public $sss, $pag_ibig, $philhealth;
    public $additonal_services;

    public bool $check_thirth = false;

    public function mount()
    {
        $this->bonus = 0;
        $this->holiday = 0;
        $this->absences = 0;
        $this->additonal_services = 0;
        $this->late = 0;
        $this->working_days = 0;
        $this->thirth_monthpay = 0;
    }

    public function addPayslip()
    {
        $payslip = new Payroll();
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
        $payslip->payroll_status = 'unpaid';
        $payslip->save();
        session()->flash('payslip', 'Payslip has been created  successfully');

        
        $emp = Employee::find($payslip->emp_id);
        $payroll_item = new PayrollItem();
        $emp_ded = EmployeeDeduction::where('emp_id', '=', $payslip->emp_id)->sum('amount');

        $en = CarbonImmutable::now()->locale('en_US');  
        // $weekly_services = Booking::where('emp_id', '=', $payslip->emp_id)
        //                             ->whereBetween('created_at', [$en->startOfWeek(Carbon::MONDAY), $en->endOfWeek(Carbon::SUNDAY)])
        //                             ->sum('services.price_fee');

         $totalServices_Amount = Service::join('bookings', 'services.id', '=', 'bookings.service_id')
                                             ->select(
                                                'services.price_fee', 
                                                'bookings.created_at',
                                                'bookings.emp_id'
                                             )
                                             ->whereBetween('bookings.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                             ->where('bookings.emp_id', $payslip->emp_id)
                                             ->sum('services.price_fee');

        // $totalServices_Amount = Booking::where('emp_id', $payslip->emp_id)->sum('price_fee');
        
        //calculation starts here...
        // deductions
        $late = $payslip->late;
        $absences = $payslip->absences;
        $late_perpay = $late * 2;
        
        $wd = $payslip->working_days;

        
        if ($emp->job_type != 'mechanic') 
        {
            $sr = $emp->salary_rate;
            $bonus = $payslip->bonus;
            $salary = $sr * $wd;
            $ot = 50 * $payslip->overtime_hrs;
            $gross = $salary + $ot + $bonus;

            // CONTRIBUTIONS 
            $sss = round($salary * 0.045);
            $philhealth = round($salary * 0.035);
            $pag_ibig = 175;
            $payslip->sss = $sss;
            $payslip->philhealth = $philhealth;
            $payslip->pagibig = $pag_ibig;
            $payslip->salary = $salary;
            $payslip->save();

            // if holiday is available do calculation process below else ignored..
            if ($payslip->holiday == 1) {
                $hd = $salary * 2;
                $payroll_item->holiday_amount = $hd;
                $gs = $salary + $ot + $hd;
                $payroll_item->gross_salary = $gs;
            }
        
            // if 13th month pay is available do calculation process below else ignored..
            if ($payslip->thirth_monthpay == 1) {
                $thirth_pay = $gross / 12;
                $total_gross = $gross + $ot + $bonus + $thirth_pay;
                $payroll_item->gross_salary = $total_gross;
            }
            
            $absent = $sr * $absences;

            //if leave is available do calculation process below else ignored..
            if ($emp->status == 1) {
                $paid_leave = $sr * 10;
                $td = $late + $absent + $sss + $philhealth + $pag_ibig + $emp_ded + $paid_leave;
                $np = $gross - $td;
                $payroll_item->leave_amount = $paid_leave;
                $payroll_item->total_deductions = $td;
                $payroll_item->net_salary = abs($np);
            }
            
            // Net salary
            $total_deduction = $late_perpay + $absent + $sss + $philhealth + $pag_ibig + $emp_ded;
            $net = $gross - $total_deduction;

            
            $payroll_item->total_deductions = $total_deduction;
            $payroll_item->net_salary = abs($net);

            $payroll_item->overtime = $ot;
            $payroll_item->gross_salary = $gross;
            $payroll_item->late_amount = $late_perpay;
            $payroll_item->absences_amount = $absent;
            $payroll_item->leave_id = $emp->leave_id;
            $payroll_item->payroll_id = $payslip->id;
            $payroll_item->emp_id = $emp->id;  
            $payroll_item->save();
        }
        elseif ($emp->job_type == 'mechanic') 
        {
           

             // if the employee is a Mechanic code will execute below
        
            $total_serve = $totalServices_Amount;
            $salary = $total_serve;
            $share_fee = $salary * 0.10;
            $total_deduction = $share_fee + $late_perpay + $emp_ded;
            $net_salary = $salary - $total_deduction;
            
            $payroll_item->total_deductions = $total_deduction;
            $payroll_item->gross_salary = $salary;
            $payroll_item->net_salary = abs($net_salary);
            $payroll_item->late_amount = $late_perpay;
            $payroll_item->absences_amount = 0;
            $payroll_item->leave_id = $emp->leave_id;
            $payroll_item->payroll_id = $payslip->id;
            $payroll_item->emp_id = $emp->id;  
            $payroll_item->save();
        }
        
    }   
    
   

    public function render()
    {
        $employee = Employee::all();
        return view('livewire.admin.add-payslip', ['employee' => $employee])->layout('layouts.admin');
    }
}
