<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'leaves';

    protected $fillable = [
        'emp_id',
        'date_from',
        'date_to',
        'status',
        'reason'
    ];
  

    public function employee()
    {
      return $this->hasOne(Employee::class, 'leave_id');
    }

    public function payrollitem()
    {
      return $this->belongsTo(Leave::class);
    }

}
