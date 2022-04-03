<div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				@if(Session::has('service'))
					<div class="alert alert-success" role="alert">
							{{Session::get('service')}}
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
                            <h2>Add new Service</h2>
                            <a href="/admin/services-list">Back</a>
                        </div>
					</div>
					<div class="card-body">
						<form  wire:submit.prevent="addService">
							<div class="form-group">
								<label for="">Service name</label>
								<input wire:model="name" type="text" class="form-control">
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
							</div>
    
							<div class="form-group">
								<label for="">Service Price</label>
								<input wire:model="price_fee" type="text" class="form-control">
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
							</div>

							<div class="form-group">
								<label for="">Service description</label>
								<textarea wire:model="description" class="form-control" name="" id="" cols="30" rows="3"></textarea>
                                <span class="text-danger">@error('description') {{ $message }} @enderror</span>
							</div>

							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
