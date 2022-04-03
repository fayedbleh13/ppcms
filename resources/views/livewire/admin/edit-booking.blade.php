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
							<h1>Approve Booking</h1>
							<a href="/admin/booking-list">Back</a>
						</div>
					</div>
					<div class="card-body">
						<form wire:submit.prevent="approveBooking">
							<input type="hidden" wire:model="booking_id">
							<div class="form-group">
								<label for="">Assign Available mechanic:</label>
								<select class="form-control" wire:model="mechanic">
                                    
                                    @if ($emp->mechanic_status == 0)
                                        <option value="">Select Available Mechanic</option>
                                    @else
                                        <option value="">No Mechanic Available</option>
                                    @endif
									
									@foreach ($employees as $e)
                                        @if ($e->job_type == "mechanic")
                                            @if ($e->mechanic_status == 0)
                                                <option value="{{ $e->id }}">{{ $e->name }}</option>
                                            @endif
                                        @endif
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-success">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
