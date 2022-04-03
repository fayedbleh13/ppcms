<?php

namespace App\Http\Livewire\Admin;

use App\Models\Allowance;
use Livewire\Component;

class Allowances extends Component
{ 
    public function render()
    {   $allowance = Allowance::all();

        return view('livewire.admin.allowances', ['allowance' => $allowance])->layout('layouts.admin');
    }
}
