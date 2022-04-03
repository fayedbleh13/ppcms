<div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				@if(Session::has('pro'))
					<div class="alert alert-success" role="alert">
							{{Session::get('pro')}}
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
                            <h1>Add new Product</h1>
                            <a href="/admin/product-list">Back</a>
                        </div>
					</div>
					<div class="card-body">
						<form enctype="multipart/form-data" wire:submit.prevent="addProduct">
							<div class="form-group">
								<label>Product name</label>
								<input type="text" class="form-control" placeholder="Product name" wire:model="name" wire:keyup="generateSlug">
							</div>

							<div class="form-group">
								<label>Product slug</label>
								<input type="text" class="form-control" placeholder="Product slug" wire:model="slug">
							</div>

							<div class="form-group">
								<label>Short description</label>
								<input type="text" class="form-control" placeholder="Short description" wire:model="short_description">
							</div>

							<div class="form-group">
								<label>Description</label>
								<input type="text" class="form-control" placeholder="Description" wire:model="description">
							</div>

							<div class="form-group">
								<label>Regular price</label>
								<input type="text" class="form-control" placeholder="Regular price" wire:model="regular_price">
							</div>

							<div class="form-group">
								<label>Sales price</label>
								<input type="text" class="form-control" placeholder="Sales price" wire:model="sale_price">
							</div>

							<div class="form-group">
								<label>SKU</label>
								<input type="text" class="form-control" placeholder="SKU" wire:model="SKU">
							</div>

							<div class="form-group">
								<label>Stock</label>
									<select class="form-control" wire:model="stock_status">
										<option value="instock">Instock</option>
										<option value="outofstock">Out of Stock</option>
									</select>
							</div>

							<div class="form-group">
								<label>Feature</label>
									<select class="form-control" wire:model="featured">
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>
							</div>

							<div class="form-group">
								<label>Quantity</label>
									<input type="text" class="form-control" placeholder="Quantity" wire:model="quantity">
							</div>

							<div class="form-group">
								<label>Product image</label><br>
									<input type="file" class="input-file" placeholder="Quantity" wire:model="image">
									@if($image)
										<img src="{{$image->temporaryUrl()}}" width="120" alt="">
									@endif
							</div>

							<div class="form-group">
								<label>Category</label>
								<select class="form-control" wire:model="category_id">
									<option value="" disabled>-- Select category</option>
									@foreach($cat as $c)
									<option value="{{$c->id}}">{{$c->name}}</option>
									@endforeach
								</select>
							</div>

							<div class="for-group">
								<button type="submit" class="form-control btn-success">Add Product</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
