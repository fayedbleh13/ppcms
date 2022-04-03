<div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
                            <h5><strong>Allowance Form</strong></h5>
                            <a href="/admin/allowances" class="btn btn-sm btn-primary">Back</a>
                        </div>
					</div>
					<div class="card-body">
						<form  wire:submit.prevent="addAllowance">
							<div class="form-group">
								<label for="">Allowance name</label>
								<input wire:model="allowance_name" type="text" class="form-control">
                                <span class="text-danger">@error('allowance_name') {{ $message }} @enderror</span>
							</div>

							<div class="form-group">
								<label for="">Allowance description</label>
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
