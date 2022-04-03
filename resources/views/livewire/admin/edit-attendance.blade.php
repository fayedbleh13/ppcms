<div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
                            <h5><strong>Update Time Record</strong></h5>
                            <a href="/admin/attendances" class="btn btn-sm btn-primary">Back</a>
                        </div>
					</div>
					<div class="card-body">
						<form  wire:submit.prevent="updateTimeRecord">
							<div class="form-group">
								<label for="">Employee</label>
								<select wire:model="emp_id" class="form-control">
                                    <option value="">-- Select Employee --</option>
                                    @foreach ($employee as $e)
                                        <option value="{{ $e->id }}">{{ $e->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('emp_id') {{ $message }} @enderror</span>
							</div>

							{{-- <div class="form-group">
								<label for="">Type</label>
								<select class="form-control" wire:model="log_type">
                                    <option value=""> -- Select time-in --</option>
                                    <option value="1">Time-in</option>
                                    <option value="2">Time-out</option>
                                </select>
                                <span class="text-danger">@error('log_type') {{ $message }} @enderror</span>
							</div> --}}

                            <div class="form-group">
                                <label for="">Time in</label>
                                <input type="time" wire:model="time_in" class="form-control datetimepicker">
                                <span class="text-danger">@error('time_in') {{ $message }} @enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="">Time out</label>
                                <input type="time" wire:model="time_out" class="form-control datetimepicker">
                                <span class="text-danger">@error('time_in') {{ $message }} @enderror</span>
                            </div>

							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary">Update List</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
