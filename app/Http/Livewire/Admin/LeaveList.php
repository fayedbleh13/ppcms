<?php

namespace App\Http\Livewire\Admin;

use App\Models\Leave;
use Livewire\Component;

class LeaveList extends Component
{
    public function render()
    {
        $leave = Leave::all();
        return view('livewire.admin.leave-list', ['leave'=>$leave])->layout('layouts.admin');
    }
}
