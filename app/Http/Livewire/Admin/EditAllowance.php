<?php

namespace App\Http\Livewire\Admin;

use App\Models\Allowance;
use Livewire\Component;


class EditAllowance extends Component
{
    public $allowance;
    public $description;
    public $allowance_id;

    public function mount($allowance_id){
       
        $allowance = Allowance::find($allowance_id);
        $this->allowance_name = $allowance->allowance_name;
        $this->description = $allowance->description;
        $this->allowance_id = $allowance->id;
    }

    public function updateAllowance()
    {
        $allowance = Allowance::find($this->allowance_id);
        $allowance->allowance_name = $this->allowance_name;
        $allowance->description = $this->description;
        $allowance->save();
        session()->flash('allowance', 'Allowance  updated succesfully');
    }

    public function render()
    {
        $allowance = Allowance::find($this->allowance_id);
        return view('livewire.admin.edit-allowance', ['allowance' => $allowance])->layout('layouts.admin');
    }
}
