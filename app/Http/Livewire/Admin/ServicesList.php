<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;
use App\Models\Service;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class ServicesList extends Component
{
  use WithFileUploads;

  public $s_name;
  public $s_description;
  public $image;
  public $service_fee;
  public $newImg;
  public $service_id;
  public $booked_time;

  public function render()
  {
      $service = Service::all();
      $pro = Booking::orderBy('created_at', 'desc')->groupBy('service_id')
        ->selectRaw('sum(total_services) as total_services, service_id')
        ->get();
        $total = DB::table('bookings')->sum('total_services');
      return view('livewire.admin.services-list', ['service'=>$service, 'pro' => $pro, 'total' => $total])->layout('layouts.admin');
  }

  public function openAddServiceModal(){
    $this->name = '';
    $this->description = '';
    $this->dispatchBrowserEvent('openAddServiceModal');
  }

  public function addService(){
    $this->validate([
      'name' => 'required|unique:services',
      'description' => 'required',
      'service_fee' => 'required'
    ]);

    $service = new Service();
    $service->name = $this->name;
    $service->description = $this->description;
    $imgName = Carbon::now()->timestamp. '.' . $this->image->extension();
    $this->image->storeAs('services', $imgName);
    $service->image = $imgName;
    $service->service_fee = $this->service_fee;
    $service->save();
    
    if ($service) {
      $this->dispatchBrowserEvent('closeAddServiceModal');
    }
  }

  public function editServices($id){
    $service = Service::find($id);
    $this->name = $service->name;
    $this->description = $service->description;
    if ($this->newImg) {
      $imgName = Carbon::now()->timestamp. '.' . $this->newImg->extension();
      $this->newImg->storeAs('services', $imgName);
      $service->image = $imgName;
  }
    $this->service_fee = $service->service_fee;
    $this->service_id = $service->id;
    $this->dispatchBrowserEvent('openUpdateServiceModal');
  }

  public function updateService(){
    $service_id = $this->id;
    $this->validate([
      'name' => 'required|unique:services',
      'description' => 'required',
      'image' => 'required',
      'service_fee' => 'required'
    ]);

    $service = new Service();
    $service->name = $this->name;
    $service->description = $this->description;
    if ($this->newImg) {
      $imgName = Carbon::now()->timestamp. '.' . $this->newImg->extension();
      $this->newImg->storeAs('services', $imgName);
      $service->image = $imgName;
  }
    $service->service_fee = $this->service_fee;
    $save = $service->save();
    if ($save) {
      $this->dispatchBrowserEvent('closeUpdateServiceModal');
    }
  }
}
