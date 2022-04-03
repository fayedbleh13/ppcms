<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\PayrollItem;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PayslipsExport implements FromView
{
    use Exportable;

    protected $payroll_id;

    public function __construct($payroll_id)
    {
        $this->payroll_id = $payroll_id;
    }
    
    
   public function view(): View
   {
       $payroll_item = PayrollItem::where('payroll_id',  $this->payroll_id)->get();
       return view('livewire.admin.payslip-details', ['payroll_item' => $payroll_item]);
   }
}
