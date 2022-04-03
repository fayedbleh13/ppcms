<div>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				@if(Session::has('payslip'))
					<div class="alert alert-success" role="alert">
							{{Session::get('payslip')}}
					</div>
				@endif
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between">
                            <h5>Create Payslip</h5>
                            <a href="/admin/payslips" class="btn btn-sm btn-primary">Back</a>
                        </div>
					</div>
					<div class="card-body">
						<form enctype="multipart/form-data" wire:submit.prevent="addPayslip">
                            <input type="hidden" wire:model="payroll_id">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label>Employee</label>
                                    <select class="form-control" wire:model="emp_id">
                                        <option value="" >-- Select employee</option>
                                        @foreach($employee as $e)
                                        <option value="{{$e->id}}">{{ $e->employee_id }} {{$e->name}} -- {{ $e->job_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6" style="margin-top: 2.3em;">
                                    <div class="form-check">
                                        <input wire:model="yesMechanic" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <b>Is this employee a Mechanic?</b>
                                        </label>
                                    </div>
                                   
                                </div>
                            </div>
                            @if ($yesMechanic)
                                <div class="row">
                                    <div class="col-md form-group">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" placeholder="Product name" wire:model="date_from">
                                    </div>
        
                                    <div class="col-md form-group">
                                        <label>End Date</label>
                                        <input type="date" class="form-control" placeholder="Product slug" wire:model="date_to">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md form-group">
                                        <label>Late (Total Minutes)</label>
                                        <input type="text" class="form-control" placeholder="Late" wire:model="late">
                                    </div>
                                </div>
                            @else
                            <div class="row">
                                <div class="col-md form-group">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" placeholder="Product name" wire:model="date_from">
                                </div>
    
                                <div class="col-md form-group">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" placeholder="Product slug" wire:model="date_to">
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Working Days</label>
                                    <input type="text" class="form-control" placeholder="Working Days" wire:model="working_days">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Bonus (Leave blank if none)</label>
                                    <input type="text" class="form-control" placeholder="Bonus" wire:model="bonus">
                                </div>
    
                                <div class="col-md-4">
                                    <div class="col form-group">
                                        <label>13th Month Pay?</label>
                                        <select class="form-control" wire:model="thirth_monthpay">
                                            <option value="" >-- Choose an option</option>
                                            <option value="0" >No</option>
                                            <option value="1" >Yes</option>
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md form-group">
                                    <label>Late (Total Minutes)</label>
                                    <input type="text" class="form-control" placeholder="Late" wire:model="late">
                                </div>
    
                                <div class="col-md form-group">
                                    <label>Absences (Total Days - Leave blank if none)</label>
                                    <input type="text" class="form-control" placeholder="Absences" wire:model="absences">
                                </div>
                            </div>
                            <div class="row">
                               
                               
                                <div class="col-md mb-3">
                                    <div class="form-check">
                                        <input wire:model="yesOvertime" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <b>Overtime?</b>
                                        </label>
                                    </div>
                                    @if ($yesOvertime)
                                        <div class="mt-2 form-group">
                                            <label>Overtime - 50 per hour (Total Hours)</label>
                                            <input type="text" class="form-control" placeholder="Overtime" wire:model="overtime_hrs">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md mb-3">
                                    <div class="form-check">
                                        <input wire:model="yesHoliday" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <b>Holiday?</b>
                                        </label>
                                    </div>
                                    @if ($yesHoliday)
                                        <div class="mt-2 form-group">
                                            <label>Holiday - double the salary (Total Hours)</label>
                                            <select class="form-control" wire:model="holiday">
                                                <option value="" >-- Choose an option</option>
                                                <option value="0" >No</option>
                                                <option value="1" >Yes</option>
                                            </select>
                                        </div>
                                    @endif
                                </div>
                                
                                
                            </div>
                            @endif
                            

                           

							<div class="for-group">
								<button type="submit" class="form-control btn-success">Create Payslip</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
