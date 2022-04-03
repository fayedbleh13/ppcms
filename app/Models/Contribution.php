<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribution extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contributions';

    public function employee()
    {
      return $this->hasMany(Employee::class);
    }
}
