<?php

namespace App\Http\Livewire\Admin;

use App\Models\Allowance;
use Livewire\Component;

class AddAllowance extends Component
{
    public $allowance_name;
    public $description;

    public function addAllowance(){

        $this->validate([
            'allowance_name'=>'required',
            'description'=>'required'
        ]);

        $allowance = new Allowance();
        $allowance->allowance_name = $this->allowance_name;
        $allowance->description = $this->description;
        $allowance->save();
        return back()->with('allowance', 'Allowance added successfully!');
    }

    public function render()
    {
        return view('livewire.admin.add-allowance')->layout('layouts.admin');
    }
}
