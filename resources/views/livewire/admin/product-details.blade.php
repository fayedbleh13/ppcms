<div>
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
                @if (Session::has('success_message'))
                <div class="alert alert-success">
                    <strong>Success</strong> {{ Session::get('success_message') }}
                </div>
                @endif
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
                            <h1>Edit Product</h1>
                            <a href="/admin/product-list">Back</a>
                        </div>
					</div>
					<div class="card-body">
						<form enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                <img class="img-fluid" style="width:150px;height:170px; margin-left: 7.5em; margin-right: 1em;" src="{{ asset('img/' . $img->image) }}" alt="{{$img->image}}">
                                </div>
                                <div class="col-sm-8 form-group">
                                    <label class="mt-2">Product name</label>
                                    <input type="text" class="form-control mb-5" placeholder="Product name" wire:model="name" readonly>

                                    <label>Product slug</label>
                                    <input type="text" class="form-control" placeholder="Product slug" wire:model="slug" readonly>
                                </div>
                                
            
                                <div class="col-sm-6 form-group">
                                   
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label>Short description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="short_description" readonly></textarea>
                                </div>
                            </div>
                           
							
                            <div class="row">
                                <div class="col form-group">
                                    <label>Short description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="short_description" readonly></textarea>
                                </div>
    
                                <div class="col form-group">
                                    <label>Description</label>
                                    <textarea readonly class="form-control" id="exampleFormControlTextarea1" placeholder="Description" rows="3" wire:model="description"></textarea>
                                </div>
                            </div>
							

                            <div class="row">
                                <div class="col form-group">
                                    <label>Regular price</label>
                                    <input readonly type="text" class="form-control" placeholder="Regular price" wire:model="regular_price">
                                </div>
    
                                <div class="col form-group">
                                    <label>Sales price</label>
                                    <input readonly type="text" class="form-control" placeholder="Sales price" wire:model="sale_price">
                                </div>
                            </div>
							
                            <div class="row">
                                <div class="col form-group">
                                    <label>SKU</label>
                                    <input readonly type="text" class="form-control" placeholder="SKU" wire:model="SKU">
                                </div>
    
                                <div class="col form-group">
                                    <label>Stock</label>
                                        <select readonly class="form-control" wire:model="stock_status">
                                            <option value="instock">Instock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                </div>
    
                                <div class="col form-group">
                                    <label>Quantity</label>
                                        <input readonly type="text" class="form-control" placeholder="Quantity" wire:model="quantity">
                                </div>
                            </div>
							
                            <div class="row">
                                <div class="col form-group">
                                    <label>Feature</label>
                                    <select readonly class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
  
                                <div class="col form-group">
                                    <label>Category</label>
                                    <select class="form-control" wire:model="category_id" readonly>
                                        <option value="">-- Select category</option>
                                        @foreach($category as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
