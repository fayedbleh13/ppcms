<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'service_id',
        'booking_status',
        'booked_time',
        'booked_date'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->reference_id = IdGenerator::generate(['table' => 'bookings', 'field' => 'reference_id', 'length' => 8, 'prefix' =>date('B')]);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public static function search($search){
      return empty($search) ? static::query()
      : static::query()->where('id', 'like', '%'.$search.'%')
      ->orWhere('user_id', 'like', '%'.$search.'%')
      ->orWhere('booked_date', 'like', '%'.$search.'%');
    }
}