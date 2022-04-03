<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Service;

class AddServices extends Component
{
    public $name;
    public $description;
    public $price_fee;

    public function addService()
    {
        $this->validate([
            'name'=>'required',
            'description'=>'required',
            'price_fee' => 'required|numeric'
        ]);

        $service = new Service();
        $service->name = $this->name;
        $service->description = $this->description;
        $service->price_fee = $this->price_fee;
        $service->save();

        return redirect('/admin/services-list')->with('service', 'Service has been created succesfully');
    }
    
    public function render()
    {
        return view('livewire.admin.add-services')->layout('layouts.admin');
    }
}
