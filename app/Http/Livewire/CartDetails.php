<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartDetails extends Component
{   
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    public $coupon_id;
    
    public function increaseQuantity($rowId)
    {       
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {       
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count', 'refreshComponent');
    }

    public function deleteItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count', 'refreshComponent');
        session()->flash('success_message','Item has been removed');
    }

    public function deleteAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count', 'refreshComponent');
        session()->flash('success_message','Cart has been cleared'); 
    }

    public function applyCoupon()
    {
        $coupon = Coupon::where('code',$this->couponCode)
            ->where('expiry_date', '>=', Carbon::today())
            ->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();

        if (!$coupon) 
        {
            session()->flash('coupon_msg','Coupon is invalid');
            return;
        }

        session()->put('coupon',[
            'id' => $coupon->id,
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);
    }
    public function calculateDiscounts()
    {
        if (session()->has('coupon')) 
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['value'];
            }
            else 
            {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
            $this->coupon_id = session()->get('coupon')['id'];
        }
    }

    public function setAmountCheckout()
    {
        if (!Cart::instance('cart')->count() > 0) 
        {
            session()->forget('checkout');
            return;
        }

        if (session()->has('coupon')) 
        {
            session()->put('checkout',[
                'id' => session()->get('coupon')['id'],
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDiscount
            ]);
        } 
        else 
        {
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }
     
    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function routeCheckout()
    {
        if (Auth::check()) 
        {
            return redirect()->route('checkout');
        } 
        else 
        {
            return redirect()->route('login');
        }  
    }

    public function render()
    {
        $this->setAmountCheckout();
        
        if (session()->has('coupon')) 
        {
            if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else 
            {
                $this->calculateDiscounts();
            }
        }
        return view('livewire.cart-details')->layout('layouts.app');
    }
}
