<?php

namespace App\Http\Livewire\Admin;

use App\Models\Deduction;
use Livewire\Component;

class Deductions extends Component
{
    public function render()
    {
        $deduction = Deduction::all();
        return view('livewire.admin.deductions', ['deduction' => $deduction])->layout('layouts.admin');
    }
}
