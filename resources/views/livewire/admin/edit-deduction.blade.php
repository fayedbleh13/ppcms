<div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				@if(Session::has('deduction'))
					<div class="alert alert-success" role="alert">
							{{Session::get('deduction')}}
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
                            <h5><strong>Deduction Form</strong></h5>
                            <a href="/admin/deductions" class="btn btn-sm btn-primary">Back</a>
                        </div>
					</div>
					<div class="card-body">
						<form  wire:submit.prevent="updateDeduct">
							<div class="form-group">
								<label for="">Deduction name</label>
								<input wire:model="deduction_name" type="text" class="form-control">
                                <span class="text-danger">@error('deduction_name') {{ $message }} @enderror</span>
							</div>

							<div class="form-group">
								<label for="">Deduction description</label>
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
