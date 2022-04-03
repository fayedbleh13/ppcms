<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $table = 'services';

  protected $fillable = [
      'name',
      'description'
  ];
  public function booking()
  {
      return $this->hasMany(Booking::class, 'service_id');
  }
  public function employee()
  {
    return $this->hasMany(Employee::class);
  }
}
