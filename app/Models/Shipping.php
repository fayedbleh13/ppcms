<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'shippings';

    protected $fillable = [
                'ship_firstname',
                'ship_lastname',
                'ship_email' ,
                'ship_mobile' ,
                'ship_address' ,
                'ship_province' ,
                'ship_city' ,
                'ship_zipcode',

    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
