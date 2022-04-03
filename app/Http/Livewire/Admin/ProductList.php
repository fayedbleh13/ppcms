<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $checkedProduct = [];
    public function render()
    {
        $pro = Product::all();
        return view('livewire.admin.product-list', ['pro'=>$pro])->layout('layouts.admin');
    }
}
