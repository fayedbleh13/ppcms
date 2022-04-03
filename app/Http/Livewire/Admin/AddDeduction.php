<?php

namespace App\Http\Livewire\Admin;

use App\Models\Deduction;
use Livewire\Component;

class AddDeduction extends Component
{
    public $deduction_name;
    public $description;
    public function addDeduction(){

        $this->validate([
            'deduction_name'=>'required',
            'description'=>'required'
        ]);

        $deduction = new Deduction();
        $deduction->deduction_name = $this->deduction_name;
        $deduction->description = $this->description;
        $deduction->save();
        session()->flash('deduction', 'Deduction added successfully!');
    }

    public function render()
    {
        
        return view('livewire.admin.add-deduction')->layout('layouts.admin');
    }
}
