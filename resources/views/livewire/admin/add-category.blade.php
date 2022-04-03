<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
              @if(Session::has('cat'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('cat')}}
                </div>
              @endif
              <div class="card">
                  <div class="card-header">
                      <div class="d-flex justify-content-between">
                        <h1>Add new Category</h1>
                        <a href="/admin/category-list">Back</a>
                      </div>
                  </div>
                  <div class="card-body">
                      <form wire:submit.prevent="storeCategory">
                          <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" placeholder="Category name" wire:model="name" wire:keyup="generateslug">
                          </div>

                          <div class="form-group">
                              <label>Slug</label>
                              <input type="text" class="form-control" placeholder="Category slug" wire:model="slug">
                          </div>

                          <div class="form-group">
                              <button type="submit" class="btn btn-success form-control">Add Category</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
