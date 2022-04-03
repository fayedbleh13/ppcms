<div>
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending Appointments</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Approved Appointments</a>
					</li>
					<li class="nav-item"  role="presentation">
						<a href="#cancel" class="nav-link" id="cancel-tab"  data-toggle="tab" role="tab" aria-controls="cancel" aria-selected="false">Cancelled Appointments</a>
					</li>
				</ul>

				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between mb-2">
                                     <h3>List of Pending Appointments</h3>
                                     <a href="{{ route('admin.update_status') }}" class="btn btn-sm btn-primary mt-2">Update Mechanic Status</a>
                                </div>
                            </div>
							<div class="card-body">
								<table class="table table-bordered" id="book_table1" style="width: 100%">
									<thead class="bg-dark">
										<tr>
                                            <th>Reference Code</th>
											<th>Client Name</th>
                                            <th>Service</th>
                                            <th>Service price</th>
											<th>Appointment Date & Time</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($booking as $book)
											@if ($book->booking_status == 0)
												<tr>
                                                    <td>{{ $book->reference_id }}</td>
													<td>{{ $book->user->name }}</td>
                                                    <td>{{ $book->service->name }}</td>
                                                    <td>{{ $book->service->price_fee }}</td>
													<td>{{ $book->booked_date }} - {{ date('h:i A', strtotime($book->booked_time)) }}</td>
													<td>
														@if ($book->booking_status == 0)
															<span class="badge badge-secondary">Pending</span>
														@endif
													</td>
													<td width="150px">
														{{--  --}}
														{{-- <button wire:click="approveBooking({{ $book->id }})" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="right" title="Approve"><i class="fas fa-check"></i></button> --}}
														<a href="{{ route('admin.edit-booking', ['booking_id'=>$book->id]) }}" class="btn btn-sm btn-success">
															<i class="fas fa-check"></i>
														</a>
														<a href="{{ route('admin.request-cancel', ['booking_id'=>$book->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></a>
														{{--<button wire:click="selectItem({{ $book->id }}, 'cancel')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Cancel">
															<i class="fas fa-ban"></i>
														</button>--}}
													</td>
												</tr>
											@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between mb-2">
                                     <h3>List of Approved Appointments</h3>
                                </div>
                            </div>
							<div class="card-body">
								<table class="table" id="book_tables" style="width: 100%">
									<thead class="bg-dark">
                                        <th>Reference Code</th>
                                        <th>Client Name</th>
										<th>Assigned Mechanic</th>
                                        <th>Service</th>
                                        <th>Service price</th>
										<th>Appointment Date & Time</th>
										<th>Status</th>
									</thead>
									<tbody>
										@foreach ($booking as $book)
											@if ($book->booking_status == 1)
												<tr>
													<td>{{ $book->reference_id }}</td>
													<td>{{ $book->user->name }}</td>
													<td>
                                                        @if($book->employee->name == Null)
                                                        <span>---------</span>
                                                        @else
                                                        {{ $book->employee->name }}
                                                        @endif
                                                       
                                                    </td>
                                                    <td>{{ $book->service->name }}</td>
                                                    <td>{{ $book->service->price_fee }}</td>
													<td>{{ $book->booked_date }} - {{ date('h:i A', strtotime($book->booked_time)) }}</td>
													<td>
														@if ($book->booking_status == 1)
															<span class="badge badge-success">Approved</span>
														@endif
													</td>
												</tr>
											@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="tab-pane fade show" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
						<div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between mb-2">
                                     <h3>List of Canceled Appointments</h3>
                                </div>
                            </div>
							<div class="card-body">
								<table class="table table-bordered">
									<thead class="bg-dark">
											<tr>
                                                <th>Reference Code</th>
												<th>Client Name</th>
                                                <th>Service</th>
                                                <th>Service price</th>
												<th>Appointment Date & Time</th>
												<th>Status</th>
											</tr>
									</thead>
									<tbody>
										@foreach ($booking as $book)
											@if ($book->booking_status == 2)
												<tr>
													<td>{{ $book->reference_id }}</td>
													<td>{{ $book->user->name }}</td>
                                                    <td>{{ $book->service->name }}</td>
                                                    <td>{{ $book->service->price_fee }}</td>
													<td>{{ $book->booked_date }} - {{ date('h:i A', strtotime($book->booked_time)) }}</td>
													<td>
														@if ($book->booking_status == 2)
															<span class="badge badge-danger">Cancelled</span>
														@endif
													</td>
												</tr>
											@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
          </div>

				</div>
			</div>

			<div class="modal fade openModalBooking" wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateBookingModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form wire:submit.prevent="updateBookingStatus">
							<div class="modal-header">
								<h5 class="modal-title w-100 text-center h3" id="updateBookingModalLabel">Reschedule booking</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<input type="hidden" class="form-control" wire:model="booking_id">
								<div class="form-group">
									<input type="date" class="form-control" wire:model="booked_date">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Reschedule</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade openApproveBookingModal" wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="approveBookingModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title w-100 text-center h3" id="updateBookingModalLabel">Assign Mechanic</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form wire:submit.prevent="approveBookingStatus" class="mt-3">
							<div class="modal-body">
								<input type="hidden" class="form-control" wire:model="booking_id">
								<div class="form-group">
									<label>Mechanic:</label>
									<select class="form-control" wire:model="mechanic">
										<option value="">Select mechanic</option>
										@foreach ($employee as $e)
                                            @if ($e->job_type == "mechanic")
                                            <option value="{{ $e->id }}">{{ $e->name }}</option>
                                            @endif
											
										@endforeach
									</select>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-sm btn-danger mx-1" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-sm btn-success">Approve</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>