<?php

namespace App\Http\Livewire\Delivery;

use App\Models\Order;
use App\Models\Transaction;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DeliveryOrderDetails extends Component
{
    use LivewireAlert;

    public  $order_id;
    public  $status;

    protected $rules = [
        'status' => 'required'
    ];

    protected $listeners = [
        'updateStatus'
    ];

    public function mount($order_id)
    {
      //$this->$order_id = $order_id;
      $orders = Order::find($order_id);
      $this->order_id = $orders->id;
    }

    public function confirm() 
    {
        $this->alert('warning', 'Are you sure you want to update the status?', [
            'position' => 'center',
            'icon' => 'warning',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Confirm',
            'onConfirmed' => 'updateStatus',
            'showCancelButton' => true,
            'confirmButtonColor' => '#5cb85c',
            'timer' => null
        ]);
    }

    public function updateStatus()
    {   
        $order_id = $this->order_id;
        $this->validate();

        $ord = Order::find($order_id)->update([
            'status' => $this->status
        ]);
        
        // $order = Order::find($order_id);
        
        // if ($order->status == 2) {
        //     $trans = Transaction::find($order_id);

        //     $trans->trans_status = 'approved';
        //     $trans->save();
        // }
        
        
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.delivery.delivery-order-details', ['order' => $order])->layout('layouts.delivery');
    }
}
