<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Service;

class EditService extends Component
{

    public $name;
    public $description;
    public $service_id;

    public function mount($service_id)
    {
        $service = service::find($service_id);
        $this->name = $service->name;
        $this->description = $service->description;
        $this->price_fee = $service->price_fee;
    }

    public function updateService()
    {
        $service = Service::find($this->service_id);
        $service->name = $this->name;
        $service->description = $this->description;
        $service->price_fee = $this->price_fee;
        $service->save();
        session()->flash('service', 'Service  updated succesfully');
    }


    
    public function render()
    {
        return view('livewire.admin.edit-service')->layout('layouts.admin');
    }
}
