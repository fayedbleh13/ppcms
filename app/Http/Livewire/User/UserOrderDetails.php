<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UserOrderDetails extends Component
{
    use LivewireAlert;

    public $order_id;
    public $status;

    protected $listeners = [
        'cancelStatus'
    ];

    public function mount($order_id)
    {
        $orders = Order::find($order_id);
        $this->order_id = $orders->id;
    }

    public function confirm() 
    {
        $this->alert('warning', 'Are you sure you want to cancel your order?', [
            'position' => 'center',
            'icon' => 'warning',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Confirm',
            'onConfirmed' => 'cancelStatus',
            'showCancelButton' => true,
            'confirmButtonColor' => '#5cb85c',
            'timer' => null
        ]);
    }

    public function cancelStatus($order_id)
     {
         $order_id = $this->order_id;
    
         $ord = Order::find($order_id)->update([
             'status' => $this->status = 3
         ]);
    }

    public function render()
    {
        
        $order = Order::find($this->order_id);
        return view('livewire.user.user-order-details',['order' => $order])->layout('layouts.app');
    }
}
