<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDeduction extends Model
{
    use HasFactory;

    protected $table = 'employee_deductions';

    protected $fillable = [
        'deduction_id',
        'type',
        'amount'
    ];

    public function payrollitem()
    {
        return $this->belongsTo(Employee_Deduction::class);
    }

    public function deduction()
    {
        return $this->belongsTo(Deduction::class, 'deduction_id');
    }
}
