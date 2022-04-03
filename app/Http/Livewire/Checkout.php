<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use Cart;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe;

class Checkout extends Component
{
    public $ship_diff_address;
   
    //for billing
    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $province;
    public $city;
    public $zipcode;
    public $stock;

    //for shipping
    public $ship_firstname;
    public $ship_lastname;
    public $ship_mobile;
    public $ship_email;
    public $ship_address;
    public $ship_province;
    public $ship_city;
    public $ship_zipcode;
    
    public $paymentmode;
    public $order_placed;

    public $card_no;
    public $cvc;
    public $exp_month;
    public $exp_year;

    public function mount()
    {
        $user = Order::where('user_id', Auth::user()->id)->first();
        $users = User::where('id', Auth::user()->id)->first();

        if ($user == Null) {
            $this->email = $users->email;
        }
        else 
        {
            $this->firstname = $user->firstname;
            $this->lastname = $user->lastname;
            $this->mobile = $user->mobile;
            $this->email = $user->user->email;
            $this->line1 = $user->line1;
            $this->city = $user->city;
            $this->province = $user->province;
            $this->zipcode = $user->zipcode;
            
        }
        
    }

    public function updated($fields)
    {
         $this->validateOnly($fields, [
             'firstname' => 'required',
             'lastname' => 'required',
             'email' => 'required|email',
             'mobile' => 'required|numeric',
             'line1' => 'required',
             'province' => 'required',
             'city' => 'required',
             'zipcode' => 'required',
             'paymentmode' => 'required'
         ]);

        //  if ($this->ship_diff_address) 
        //  {
        //      $this->validateOnly($fields, [
        //          'ship_firstname' => 'required',
        //          'ship_lastname' => 'required',
        //          'ship_email' => 'required|email',
        //          'ship_mobile' => 'required|numeric',
        //          'ship_address' => 'required',
        //          'ship_province' => 'required',
        //          'ship_city' => 'required',
        //          'ship_zipcode' => 'required',
        //          'paymentmode' => 'required'
        //      ]);
        //  }
            
            // if ($this->paymentmode == "card") 
            // {
            //     $this->validateOnly($fields,[
            //         'card_no' => 'require|numeric',
            //         'cvc' => 'require|numeric',
            //         'exp_month' => 'require|numeric',
            //         'exp_year' => 'require|numeric' 

            //     ]);
            // }
    }
    
    public function placeOrder()
    {
         $this->validate([
             'firstname' => 'required',
             'lastname' => 'required',
             'email' => 'required|email',
             'mobile' => 'required',
             'line1' => 'required',
             'province' => 'required',
             'city' => 'required',
             'zipcode' => 'required',
             'paymentmode' => 'required'
         ]);

        // if ($this->paymentmode =='card') 
        // {
        //     $this->validate([
        //         'card_no' => 'require|numeric',
        //         'cvc' => 'require|numeric',
        //         'exp_month' => 'require|numeric',
        //         'exp_year' => 'require|numeric' 
        //     ]);
        // }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile = $this->mobile;
        $order->email = $this->email;
        $order->line1 = $this->line1;
        $order->province = $this->province;
        $order->city = $this->city;
        $order->zipcode = $this->zipcode;
        $order->status = 0;
        $order->order_type = 'online';
        $order->usedcoup_qty = 0;
        $order->is_shipping_different = $this->ship_diff_address ? 1:0;
        $order->save();
        $order->id;

        foreach (Cart::instance('cart')->content() as $item) 
        {   
            
            $orderItem = new Order_item();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save(); 
        }

        // function below for every order placed, the quantity of product
        // is subtracted or decreased from the stocks.
        
        foreach (Cart::instance('cart')->content() as $item) 
        {
            $product = Product::find($item->id);
            $product->decrement('quantity', $item->qty);
        }

        if ( $order->discount > 0) {
            $coupon = Coupon::where('code', session()->get('coupon')['code'])->decrement('quantity');
            $order->coupon_id = session()->get('coupon')['id'];
            $order->usedcoup_qty = 1;
            $order->save();
        }
 
        if ($this->ship_diff_address) 
        {
            //  $this->validate([
            //      'ship_firstname' => 'required',
            //      'ship_lastname' => 'required',
            //      'ship_email' => 'required|email',
            //      'ship_mobile' => 'required|numeric',
            //      'ship_address' => 'required',
            //      'ship_province' => 'required',
            //      'ship_city' => 'required',
            //      'ship_zipcode' => 'required'
            //  ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->ship_firstname = $this->ship_firstname;
            $shipping->ship_lastname = $this->ship_lastname;
            $shipping->ship_mobile = $this->ship_mobile;
            $shipping->ship_email = $this->ship_email;
            $shipping->ship_address = $this->ship_address;
            $shipping->ship_province = $this->ship_province;
            $shipping->ship_city = $this->ship_city;
            $shipping->ship_zipcode = $this->ship_zipcode;
            $shipping->save();
        }

        if ($this->paymentmode == 'cod') 
        {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
            $this->sendOrderConfirmationMail($order);
        }
        else if ($this->paymentmode == 'card')
        {
            $secret_key = env('STRIPE_SECRET_KEY');
            $stripe = Stripe::setApiKey($secret_key);

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc

                    ]
                ]);

                if (!isset($token['id'])) 
                {
                    session()->flash('stripe_error','The stripe token was not generated correctly');
                    $this->order_placed = 0;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->firstname . ' ' . $this->lastname,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->line1,
                        'postal_code' => $this->zipcode,
                        'city' => $this->city,
                        'state' => $this->province,
                        'country' => 'Philippines'
                    ],
                    'shipping' => [
                        'name' => $this->firstname . ' ' . $this->lastname,
                        'address' => [
                            'line1' => $this->line1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => 'Philippines'
                        ],
                    ],
                    'source' => $token['id']
                ]);

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'PHP',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order no' . $order->id
                ]);

                if ($charge['status'] == 'succeeded') 
                {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                }
                else
                {
                    session()->flash('stripe_error', 'Error in Transaction');
                    $this->order_placed = 0;
                }
            } catch(Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->order_placed = 0;
            }
           
        }
       
    }

    public function resetCart()
    {
        $this->order_placed = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        // session()->forget('coupon');
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->payment_mode = $this->paymentmode;
        $transaction->trans_status = $status;
        $transaction->save();
    }

    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function verifyCheckout()
    {
        if (!Auth::check()) 
        {
            return redirect()->route('login');
        }
        elseif ($this->order_placed) 
        {
            return redirect()->route('order');
        }
        elseif (!session()->get('checkout')) 
        {
            return redirect()->route('product.cart');
        }
    }
   
    public function render()
    {
        
        $this->verifyCheckout();
        return view('livewire.checkout')->layout('layouts.app');
    }
}
