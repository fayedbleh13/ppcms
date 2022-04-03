<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
    public function render()
    {
        $users = User::orderBy('created_at', 'DESC')->where('user_type', 'USR')->get();
        return view('livewire.admin.user-list', ['users'=>$users])->layout('layouts.admin');
    }
}
