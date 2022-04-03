<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;
    
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

    public function mount(){
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function addProduct(){
        $pro = new Product();
        $pro->name = $this->name;
        $pro->slug = $this->slug;
        $pro->short_description = $this->short_description;
        $pro->description = $this->description;
        $pro->regular_price = $this->regular_price;
        $pro->sale_price = $this->sale_price;
        $pro->SKU = $this->SKU;
        $pro->stock_status = $this->stock_status;
        $pro->featured = $this->featured;
        $pro->quantity = $this->quantity;
        $imgName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products', $imgName);
        $pro->image = $imgName;
        $pro->category_id = $this->category_id;
        $pro->save();
        session()->flash('pro', 'Product added successfully!');
    }

    public function render()
    {
        $cat = Category::all();
        return view('livewire.admin.add-product', ['cat'=>$cat])->layout('layouts.admin');
    }
}
 