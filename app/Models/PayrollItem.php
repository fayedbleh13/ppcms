<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollItem extends Model
{
    use HasFactory;

    protected $table = 'payroll_items';
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function employee_allowances()
    {
        return $this->hasMany(Employee_Allowance::class);
    }

    public function employee_deductions()
    {
        return $this->hasMany(Employee_Deduction::class);
    }

    public function leave()
    {
        return $this->hasOne(Leave::class);
    }

    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'payroll_id');
    }
}
