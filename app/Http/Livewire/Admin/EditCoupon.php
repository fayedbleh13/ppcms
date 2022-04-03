<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class EditCoupon extends Component
{   
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $quantity;
    public $expiry_date;

    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->coupon_id = $coupon->id;
        $this->quantity = $coupon->quantity;
        $this->expiry_date = $coupon->expiry_date;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' =>'required|numeric'
        ]);
    }
    public function updateCoupon()
    {
        $coupon = Coupon::find($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->quantity = $this->quantity;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('msg', 'Coupon has been updated succesfully');
    }

    public function render()
    {
        return view('livewire.admin.edit-coupon')->layout('layouts.admin');
    }
}
