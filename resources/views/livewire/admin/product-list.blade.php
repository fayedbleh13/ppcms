<div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
                            <h1>Product List</h1>
                            <a href="/admin/add-product" class="btn btn-sm btn-primary">Add new Product</a>
                        </div>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-sm" id="example1" style="text-align: center;">
							<thead class="bg-dark">
									<tr>
											<th>SKU</th>
											<th>Stock Status</th>
											<th>Name</th>
											<!--<th>Slug</th>
											<th>Short description</th>
											<th>Description</th>-->
											<th>Price</th>
											<th>Qty</th>
											<th>Img</th>
											<th>Category</th>
											<th>Actions</th>
									</tr>
							</thead>
							<tbody>
								@foreach($pro as $p)
									<tr>
										<td>{{$p->SKU}}</td>
										<td>
											@if($p->stock_status == 'instock')
												<span class="badge badge-success">In-Stock</span>
											@else
												<span class="badge badge-danger">Unavailable</span>
											@endif
										</td>
										<td>{{$p->name}}</td>
										<!--<td>{{$p->slug}}</td>
										<td>{{$p->short_description}}</td>
										<td>{{$p->description}}</td>-->
										<td>{{$p->regular_price}}</td>
										<td>{{$p->quantity}}</td>
										
										<td><img src="{{ asset('img/' . $p->image) }}" width="50" alt="{{$p->image}}"></td>
										<td>{{$p->cat->name}}</td>
										<td>    
											<a href="{{ route('admin.product-details', ['product_slug'=>$p->slug]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a >
											<a href="{{ route('admin.edit-product', ['product_slug'=>$p->slug]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a >
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
