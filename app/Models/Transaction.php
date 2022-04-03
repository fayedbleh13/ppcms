<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transactions';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->transaction_code = IdGenerator::generate(['table' => 'transactions', 'field' => 'transaction_code', 'length' => 10, 'prefix' =>date('m')]);
        });
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    
}
