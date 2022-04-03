<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class EditProduct extends Component
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
    public $newImg;
    public $product_id;
    
    public function mount($product_slug){
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

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function updateProduct(){
        $pro = Product::find($this->product_id);
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
        if ($this->newImg) {
            $imgName = Carbon::now()->timestamp. '.' . $this->newImg->extension();
            $this->newImg->storeAs('products', $imgName);
            $pro->image = $imgName;
        }
        $pro->category_id = $this->category_id;
        $pro->save();

        $restock = new Inventory();
        $restock->product_id = $this->product_id;
        $restock->stock_qty = $this->quantity;
        $restock->restock_date = $pro->updated_at;
        $restock->save();

        session()->flash('success_message','Product updated successfully!');
    }

    public function render()
    {
        $category = Category::all();
        return view('livewire.admin.edit-product', ['category'=>$category])->layout('layouts.admin');
    }
}
