<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employees';
    
    protected $fillable = [
        'user_id',
        'leave_id',
        'name',
        'job_type',
        'gender',
        'email',
        'mobile',
        'salary_rate',
        'status'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->employee_id = IdGenerator::generate(['table' => 'employees', 'field' => 'employee_id', 'length' => 10, 'prefix' => 2021]);
        });
    }

    public function contribution()
    {
      return $this->belongsTo(Contribution::class);
    }

    public function service()
    {
      return $this->belongsTo(Service::class);
    }

    public function leave()
    {
      return $this->belongsTo(Leave::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    public function employee_allowance()
    {
        return $this->belongsTo(Employee_Allowance::class);
    }

    public function employee_deduction()
    {
        return $this->belongsTo(Employee_Deduction::class);
    }

    public function payrollitem()
    {
        return $this->hasMany(PayrollItem::class, 'emp_id', 'payroll_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'emp_id');
    }

    public function booking()
    {
        return $this->hasOne(Booking::class, 'emp_id');
    }
}
