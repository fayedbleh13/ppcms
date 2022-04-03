<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class Search extends Component
{   
    public $sorting;
    public $search;
    
   

    public function mount()
    {
        $this->sorting ="default";
        $this->fill(request()->only('search'));
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Products');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
        
    }
    use WithPagination;
    public function render()
    {   

        if ($this->sorting=="latest") 
        {   
            $products = Product::where('name','LIKE', "%".$this->search."%")->orderBy('created_at','DESC')->paginate(15);
        }
        elseif ($this->sorting=='price_asc') 
        {
            $products = Product::where('name','LIKE', "%".$this->search."%")->orderBy('created_at','DESC')->paginate(15);
        }
        elseif ($this->sorting=='price_desc') 
        {
            $products = Product::where('name','LIKE', "%".$this->search."%")->orderBy('created_at','DESC')->paginate(15);
        }
        else 
        {
            $products = Product::where('name','LIKE', "%".$this->search."%")->orderBy('created_at','DESC')->paginate(15);
        }
        
        $categories = Category::all();

        return view('livewire.search', ['products'=> $products, 'categories'=> $categories, 'categories'=> $categories])->layout('layouts.app');
    }
}
