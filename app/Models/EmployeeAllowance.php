<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAllowance extends Model
{
    use HasFactory;

    protected $table = 'employee_allowances';

    protected $fillable = [
        'allowance_id',
        'type',
        'amount'
    ];

    public function payrollitem()
    {
        return $this->belongsTo(Employee_Allowance::class);
    }
    public function allowance()
    {
        return $this->belongsTo(Allowance::class, 'allowance_id');
    }
}
