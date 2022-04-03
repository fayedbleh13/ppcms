<?php

namespace App\Http\Livewire\Admin;

use App\Models\Inventory as invent;
use App\Models\Order;
use Livewire\Component;
use App\Models\Order_item;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Sum;

class Inventory extends Component
{
    public function render()
    {
        $pro = Order_item::orderBy('created_at', 'desc')->groupBy('product_id')->selectRaw('sum(quantity) as quantity, product_id')->get();
        $total = DB::table('order_items')->sum('quantity');
        $inventory = invent::all();
        return view('livewire.admin.inventory', ['pro' => $pro, 'total' => $total, 'inventory' => $inventory])->layout('layouts.admin');
    }
}
