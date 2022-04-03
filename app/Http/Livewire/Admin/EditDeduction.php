<?php

namespace App\Http\Livewire\Admin;

use App\Models\Deduction;
use Livewire\Component;

class EditDeduction extends Component
{
    public $deduction_name;
    public $description;
    public $deduction_id;

    public function mount($deduction_id){
        $deduct = Deduction::find($deduction_id);
        $this->deduction_name = $deduct->deduction_name;
        $this->description = $deduct->description;
        $this->deduction_id = $deduct->id;
    }

    public function updateDeduct(){
        $deduction = Deduction::find($this->deduction_id);
        $deduction->deduction_name = $this->deduction_name;
        $deduction->description = $this->description;
        $deduction->save();
        session()->flash('deduction', 'Deduction updated successfully!');
        
    }
    public function render()
    {
        return view('livewire.admin.edit-deduction')->layout('layouts.admin');
    }
}
