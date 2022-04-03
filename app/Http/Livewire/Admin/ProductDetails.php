<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newImg;
    public $product_id;
    
    public function mount($product_slug)
    {
        $pro = Product::where('slug', $product_slug)->first();
        $this->name = $pro->name;
        $this->slug = $pro->slug;
        $this->short_description = $pro->short_description;
        $this->description = $pro->description;
        $this->regular_price = $pro->regular_price;
        $this->sale_price = $pro->sale_price;
        $this->SKU = $pro->SKU;
        $this->stock_status = $pro->stock_status;
        $this->featured = $pro->featured;
        $this->quantity = $pro->quantity;
        $this->category_id = $pro->category_id;
        $this->product_id = $pro->id;
    }
    
    public function render()
    {
        $img = Product::where('id', $this->product_id)->first();
        $category = Category::all();
        return view('livewire.admin.product-details', ['img' => $img, 'category' => $category])->layout('layouts.admin');
    }
}
