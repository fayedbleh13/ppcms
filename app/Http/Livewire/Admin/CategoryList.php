<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryList extends Component
{

  public $name;
  public $slug;
  public $c_id;
  
  protected $listeners = ['delete'];

  public function deleteCategory($id){
      $cat = Category::find($id);
      $this->dispatchBrowserEvent('SwalConfirm', [
        'id'=>$id
      ]);
  }

  public function delete($id){
    $cat = Category::find($id)->delete();
    if ($cat) {
      $this->dispatchBrowserEvent('deleted');
    }
  }

  public function render()
  {
      $cat = Category::all();
      return view('livewire.admin.category-list', ['cat'=>$cat])->layout('layouts.admin');
  }

  /* ADD CATEGORY FUNCTION START */
  public function generateslug(){
    $this->slug = Str::slug($this->name);
  }

  public function openAddCategoryModal(){
    $this->dispatchBrowserEvent('openAddCategoryModal');
  }

  public function AddCategory(){
    $this->validate([
      'name' => 'required|unique:categories',
      'slug' => 'required'
    ]);

    $category = new Category();
    $category->name = $this->name;
    $category->slug = $this->slug;
    $category->save();

    if ($category) {
      $this->dispatchBrowserEvent('closeAddCategoryModal');
    }
  }
  /* ADD CATEGORY FUNCTION END */

  /* UPDATE CATEGORY FUNCTION START */

  public function editCategory($id){
    $cat = Category::find($id);
    $this->name = $cat->name;
    $this->slug = $cat->slug;
    $this->c_id = $cat->id; 
    $this->dispatchBrowserEvent('openUpdateCategoryModal', [
      'id'=>$id
    ]);
  }

  public function UpdateCategory(){
    $c_id = $this->c_id;
    $this->validate([
      'name' => 'required',
      'slug' => 'required'
    ]);

    $cat = Category::find($c_id)->update([
      'name' => $this->name,
      'slug' => $this->slug
    ]);

    if ($cat) {
      $this->dispatchBrowserEvent('closeUpdateCategoryModal');
    }
  }
  /* UPDATE CATEGORY FUNCTION END */
}
