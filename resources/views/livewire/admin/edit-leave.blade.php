<div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				@if(Session::has('leave'))
					<div class="alert alert-success" role="alert">
							{{Session::get('leave')}}
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
                            <h5>Assign Leave</h5>
                            <a href="/admin/leave-list" class="btn btn-sm btn-primary">Back</a>
                        </div>
					</div>
					<div class="card-body">
						<form enctype="multipart/form-data" wire:submit.prevent="updateLeave">
                            <div class="form-group">
								<label>Employee</label>
								<select class="form-control" wire:model="emp_id">
									<option value="" >-- Select employee</option>
									@foreach($emp as $e)
									<option value="{{$e->id}}">{{ $e->employee_id }} {{$e->name}}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Start Date</label>
								<input type="date" class="form-control" placeholder="Product name" wire:model="date_from">
							</div>

							<div class="form-group">
								<label>End Date</label>
								<input type="date" class="form-control" placeholder="Product slug" wire:model="date_to">
							</div>

                            <div class="form-group">
								<label>Status</label>
									<select class="form-control" wire:model="status">
										<option value="active">Active</option>
										<option value="on-leave">On-Leave</option>
									</select>
							</div>

							<div class="form-group">
								<label>Reason of lave</label>
								<input type="text" class="form-control" placeholder="Short description" wire:model="reason">
                            </div>
				
							<div class="for-group">
								<button type="submit" class="form-control btn-success">Assign Leave</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
