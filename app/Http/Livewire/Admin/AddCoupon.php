<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AddCoupon extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $quantity;
    public $expiry_date;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' =>'required|numeric'
        ]);
    }
    
    public function storeCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required',
            'cart_value' =>'required',
        ]);

        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->quantity = $this->quantity;
        $coupon->expiry_date = $this->expiry_date;
        
        $coupon->save();
        return redirect('/admin/coupon-list')->with('msg', 'Coupon has been created succesfully');
    }

    public function render()
    {
        return view('livewire.admin.add-coupon')->layout('layouts.admin');
    }
}
