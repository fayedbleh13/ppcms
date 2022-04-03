<?php

namespace App\Http\Livewire\WalkInPos;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\SelectedItem;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Transaction;
use Cart;
use Auth;
use Carbon\Carbon;
use Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $name;
    public $qty;
    public $regular_price;
    public $myCouponCode;
    public $thisCouponCode;
    public $payment;
    public $change, $discount, $subtotalAfterDiscount, $taxAfterDiscount, $totalAfterDiscount;
    public $total;
    public $searchTerm;
    public $coupon_id;

    public function placeOrder()
    {
        $order = new Order();
        $order->firstname = $this->name;
        $order->user_id = Auth::user()->id;
        $order->subtotal = Cart::instance('pos')->subtotal();
        $order->discount = $this->discount;
        $order->payment = $this->payment;
        $order->change = $this->change;
        $order->order_type = 'offline';
        $order->tax = Cart::instance('pos')->tax();
        $order->total = Cart::instance('pos')->total();
        $order->save();
        session()->flash('order', 'Transaction successful!');

        foreach (Cart::instance('pos')->content() as $item) 
        {
            $orderItem = new Order_item();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save(); 
        }

        foreach (Cart::instance('pos')->content() as $item) {
            $product = Product::find($item->id);
            $product->decrement('quantity', $item->qty);
        }
        
        //coupons decrease
        if ( $order->discount > 0) {
            $coupon = Coupon::where('code', session()->get('coupon')['code'])->decrement('quantity');
            $order->coupon_id = session()->get('coupon')['id'];
            $order->usedcoup_qty = 1;
            $order->save();
        }

        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order->id;
        $transaction->payment_mode = 'counter';
        $transaction->trans_status = 'approved';
        $transaction->save();
        
        
        Cart::instance('pos')->destroy();
        $this->reset();
        
        $this->alert('success', 'Transaction Successful', [
            'position' => 'center'
        ]);
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('pos')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        return back();
        
    }

    public function selectItem(){
        $si = new SelectedItem();
        $si->name = $this->name;
        $si->regular_price = $this->regular_price;
        $si->save();
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
                $this->discount = (Cart::instance('pos')->subtotal() * session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount = Cart::instance('pos')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('pos.tax'))/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
            $this->coupon_id = session()->get('coupon')['id'];
        }
    }

    public function addCoupon()
    {
        $coupon = Coupon::where('code',$this->thisCouponCode)
            ->where('expiry_date', '>=', Carbon::today())
            ->where('cart_value','<=',Cart::instance('pos')->subtotal())->first();
            
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

    public function deleteItem($rowId)
    {
        Cart::instance('pos')->remove($rowId);
        
    }

    public function deleteAll()
    {
        Cart::instance('pos')->destroy();
        $this->reset();
        session()->flash('success_message','Cart has been cleared'); 
    }

    public function balanceCalculation()
    {
       if (Session::has('coupon')) {
        $this->total = $this->totalAfterDiscount;
        $this->payment = $this->payment;
        $this->change = (int)$this->total - (int)$this->payment;

       } else {
        $this->total = Cart::instance('pos')->total();
        $this->payment = $this->payment;
        $this->change = (int)$this->total - (int)$this->payment;
       }
        
    }

    public function increaseQuantity($rowId)
    {       
        $product = Cart::instance('pos')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('pos')->update($rowId, $qty);
        
    }

    public function decreaseQuantity($rowId)
    {       
        $product = Cart::instance('pos')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('pos')->update($rowId, $qty);
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function render()
    {   
        // $searchTerm = '%'.$this->searchTerm.'%';
        $products = Product::where('name', 'LIKE', "%".$this->searchTerm."%")->get();
        $category = Category::all();
        $orders = Order::orderBy('created_at', 'DESC')->where('order_type', 'offline')->paginate(5);

        $total = Cart::instance('pos')->total();
        $subtotal = Cart::instance('pos')->subtotal();
        $this->balanceCalculation();

        if (session()->has('coupon')) 
        {
            if (Cart::instance('pos')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else 
            {
                $this->calculateDiscounts();
            }
        }
        
        return view('livewire.walk-in-pos.index', ['subtotal' => $subtotal, 'orders'=> $orders, 'products'=>$products, 'category'=>$category, 'total' => $total])->layout('layouts.wip-header');
    }
}
