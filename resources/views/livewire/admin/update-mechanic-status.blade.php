<div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				@if (Session::has('msg'))
					<div class="alert alert-success">
						{{ Session::get('msg') }}
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
							<h1>Update Mechanic Status</h1>
							<a href="/admin/booking-list">Back</a>
						</div>
					</div>
					<div class="card-body">
						<form wire:submit.prevent="updateMechanicStatus">
							<div class="form-group">
								<label for="">Mechanics:</label>
								<select class="form-control" wire:model="mechanic">
									<option value="">Select Mechanic</option>
									@foreach ($employees as $e)
                                        @if ($e->job_type == "mechanic")
                                            @if ($e->mechanic_status == 1)
                                                <option value="{{ $e->id }}">{{ $e->name }}</option>
                                            @endif
                                        @endif
									@endforeach
								</select>
							</div>
                           
							<div class="form-group">
								<button type="submit" class="form-control btn btn-success">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
