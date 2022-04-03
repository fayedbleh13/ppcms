<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $tables = 'payrolls';

    protected $fillable = [
        'emp_id',
        'date_from',
        'date_to',
        'working_days',
        'late',
        'absences',
        'thirth_monthpay',
        'overtime_hrs',
        'payroll_status'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->reference_id = IdGenerator::generate(['table' => 'payrolls', 'field' => 'reference_id', 'length' => 6, 'prefix' => 555]);
        });
    }


    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function leave()
    {
      return $this->belongsToMany(Leave::class);
    }

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function payrollitem()
    {
        return $this->hasOne(Payroll::class, 'payroll_id');
    }
}
