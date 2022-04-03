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
                            <h2>Cancel Appointment</h2>
                            <a href="/admin/booking-list">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Cancel this Appointment</h4>
                        <form  wire:submit.prevent="cancelBooking">
                            <input type="hidden" class="form-control" wire:model="booking_id">
                            <input type="hidden" class="form-control" wire:model="booking_status">
                            <br>
                            <button class="btn btn-block btn-success">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
