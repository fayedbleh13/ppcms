<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class Shop extends Component
{   
    protected $paginationTheme = 'bootstrap';

    public $sorting;

    public function mount()
    {
        $this->sorting ="default";
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
        
    }
    use WithPagination;
    public function render()
    {   
        if ($this->sorting=="latest") 
        {
            $products = Product::orderBy('created_at','DESC')->paginate(10);
            $pro_total = Product::count();
        }
        elseif ($this->sorting=='price_asc') 
        {
            $products = Product::orderBy('regular_price','ASC')->paginate(10);
            $pro_total = Product::count();
        }
        elseif ($this->sorting=='price_desc') 
        {
            $products = Product::orderBy('regular_price','DESC')->paginate(10);
            $pro_total = Product::count();
        }
        else 
        {
            $products = Product::paginate(10);
            $pro_total = Product::count();
        }
        
        $categories = Category::all();

        return view('livewire.shop', ['products'=> $products, 'categories'=> $categories, 'pro_total' => $pro_total])->layout('layouts.app');
    }
}
