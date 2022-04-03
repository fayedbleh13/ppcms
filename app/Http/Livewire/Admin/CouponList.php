<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class CouponList extends Component
{

    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    
    protected $listeners = ['delete'];

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function deleteCoupon($id){
        $coupons = Coupon::find($id);
        $this->dispatchBrowserEvent('SwalConfirm', [
        'title'=>'Remove this data?',
        'id'=>$id
        ]);
    }

    public function delete($id){
        $coupons = Coupon::find($id)->delete();
        if ($coupons) {
        $this->dispatchBrowserEvent('deleted');
        }
    }

    public function openAddCouponModal(){
        $this->code = '';
        $this->type = '';
        $this->value = '';
        $this->cart_value = '';
        $this->dispatchBrowserEvent('openAddCouponModal');
    }

    public function addCoupon(){
        $this->validate([
        'code' => 'required|unique:coupons',
        'type' => 'required',
        'value' => 'required|integer',
        'cart_value' =>'required|integer'
        ]);

        $coupons = new Coupon();  
        $coupons->code = $this->code;
        $coupons->type = $this->type;
        $coupons->value = $this->value;
        $coupons->cart_value = $this->cart_value;
        $coupons->save();
        
        if ($coupons) {
        $this->dispatchBrowserEvent('closeAddCouponModal');
        }
    }

    public function editCoupon($id){
        $coupons = Coupon::find($id);
        $this->code = $coupons->code;
        $this->type = $coupons->type;
        $this->value = $coupons->value;
        $this->cart_value = $coupons->cart_value;
        $this->coupon_id = $coupons->id;
        $this->dispatchBrowserEvent('openUpdateCouponModal', [
        'id'=>$id
        ]);
    }

    public function updateCoupon()
    {
        $coupon_id = $this->id;
        $this->validate([
        'code' => 'required|unique:coupons',
        'type' => 'required',
        'value' => 'required|numeric',
        'cart_value' =>'required|numeric'
        ]);

        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();

        if ($coupon) {
        $this->dispatchBrowserEvent('closeUpdateCouponModal');
        }
    }

    public function render()
    {
        $coupons = Coupon::paginate(7);
        $total = DB::table('orders')->sum('usedcoup_qty');
        $ord = Order::orderBy('created_at', 'desc')->groupBy('coupon_id')->selectRaw('sum(usedcoup_qty) as quantity, coupon_id')->get();
        return view('livewire.admin.coupon-list', ['coupons'=>$coupons, 'ord' => $ord, 'total' => $total])->layout('layouts.admin');
    }
}
