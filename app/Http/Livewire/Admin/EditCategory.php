<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class EditCategory extends Component
{

    public $category_slug;
    public $category_id;
    public $name;
    public $slug;

    public function mount($category_slug){
        $this->category_slug = $category_slug;
        $cat = Category::where('slug', $category_slug)->first();
        $this->category_id = $cat->id;
        $this->name = $cat->name;
        $this->slug = $cat->slug;
    }

    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function editCategory(){
        $cat = Category::find($this->category_id);
        $cat->name = $this->name;
        $cat->slug = $this->slug;
        $cat->save();
        session()->flash('cat', 'Category updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.edit-category')->layout('layouts.admin');
    }
}
