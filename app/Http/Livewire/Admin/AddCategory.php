<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class AddCategory extends Component
{
    public $service_id;
    public $name;
    public $slug;

    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function resetInputFields(){
        $this->name = '';
        $this->slug = '';
    }

    public function storeCategory(){
        $cat = new Category();
        $cat->name = $this->name;
        $cat->slug = $this->slug;
        $cat->save();
        return redirect('/admin/category-list')->with('cat', 'Category added successfully!');
    }
    public function render()
    {
        return view('livewire.admin.add-category')->layout('layouts.admin');
    }
}
