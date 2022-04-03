<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    use HasFactory;

    protected $table = 'allowances';

    protected $fillable = [
      'allowance_name',
      'description'
    ];

    public function employee_allowance()
    {
        return $this->hasMany(Employee_Allowance::class, 'allowance_id');
    }
}
