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
            <div class="d-flex justify-content-between mb-2">
              <h1>Category List</h1>
							{{--<button type="button" class="btn btn-primary mt-2" wire:click="openAddCategoryModal">Add new Category</button>--}}
                            <a href="/admin/add-category" class="btn btn-sm btn-primary">Add new Category</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-sm" id="category_table">
							<thead class="bg-dark">
								<tr>
									<th>Name</th>
									<th>Link</th>
                                    <th>Date Added</th>
									<th>Actions</th>
								</tr>
						</thead>
						<tbody>
							@foreach($cat as $c)
								<tr>
									<td>{{$c->name}}</td>
									<td>{{$c->slug}}</td>
                                    <td>{{ $c->created_at }}</td>
									<td>
										{{--<button wire:click="editCategory({{ $c->id }})" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>--}}
										<a href="{{ route('admin.edit-category', ['category_slug'=>$c->slug]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
										<a href="#" wire:click="deleteCategory({{$c->id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				{{-- ADD CATEGORY MODAL START --}}
				<div class="modal fade addCategoryModal" wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
							</div>
							<form wire:submit.prevent="AddCategory">
								<div class="modal-body">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" placeholder="Category name" wire:model="name" wire:keyup="generateslug">
										<span class="text-danger">@error('name') {{ $message }}@enderror</span>
									</div>

									<div class="form-group">
										<label>Slug</label>
										<input type="text" class="form-control" placeholder="Category slug" wire:model="slug">
										<span class="text-danger">@error('slug') {{ $message }}@enderror</span>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-sm btn-success">Add</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				{{-- ADD CATEGORY MODAL END --}}

				{{-- UPDATE CATEGORY MODAL START --}}
				<div class="modal fade updateCategoryModal" wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
							</div>
							<form wire:submit.prevent="UpdateCategory">
								<input type="hidden" wire:model="c_id">
								<div class="modal-body">
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" placeholder="Category name" wire:model="name" wire:keyup="generateslug">
										<span class="text-danger">@error('name') {{ $message }}@enderror</span>
									</div>

									<div class="form-group">
										<label>Slug</label>
										<input type="text" class="form-control" placeholder="Category slug" wire:model="slug">
										<span class="text-danger">@error('slug') {{ $message }}@enderror</span>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-sm btn-primary">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				{{-- UPDATE CATEGORY MODAL END --}}
			</div>
		</div>
	</div>
</div>
</div>
