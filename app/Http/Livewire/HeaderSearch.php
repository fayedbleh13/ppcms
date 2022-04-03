<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderSearch extends Component
{   
    public $search;
    

    public function mount()
    {
        $this->fill(request()->only('search'));
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.header-search', ['categories'=> $categories]);
    }
}
