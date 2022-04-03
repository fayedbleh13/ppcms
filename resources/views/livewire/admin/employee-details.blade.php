<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid mt-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h1 class="m-0">Employee Details</h1>
                            <a class="btn btn-secondary " href="/admin/employee-list">Back to Employee List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <article class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><b><small>Employee ID: </small>{{ $employees->employee_id }}</b></h4>
                                    <h4><b><small>Name: </small>{{ ucwords($employees->name) }}</b></h4>
                                    <h6><b>Job Position: {{ ucwords($employees->job_type) }}</b></h6>
                                    @if ($employees->salary_rate == 0)
                                        <h6><b>Salary Rate: <span class="badge badge-info">None</span></b></h6>
                                            
                                    @else
                                        <h6><b>Salary Rate: {{ ucwords($employees->salary_rate) }}</b></h6>
                                    @endif
                                    
                                </div>
                                <div class="col-md-6">
                                    <h5><b><small>Email: </small>{{ $employees->email }}</b></h5>
                                    <h5><b><small>Contact Number: </small> {{ $employees->mobile }}</b></h5>
                                    <h5><b><small>Gender: </small>{{ ucfirst($employees->gender) }}</b></h5>
                                    
                                </div>
                            </div>
                        </article> <!-- card-body.// -->
                        <hr>
                        @if ($employees->status == 1)
                            
                            <div class="card border-top mt-2">
                                <div class="card-header custom-card-header-2">
                                    <h4 class="m-0">Leave Details</h4>
                                </div>
                                <div class="card-body">
                                    <h4><small>Leave Status: </small><b>
                                        @if ($employees->status = 1)
                                            <span class="badge badge-info">On-Leave</span>
                                        @else
                                            <span class="badge badge-info">Active</span>
                                        @endif
                                    </b></h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <h5><small>Date Start: </small><b>{{ $employees->leave->date_from }}</b></h5>
                                        <h5><small>Date End: </small><b>{{ $employees->leave->date_to }}</b></h5>
                                        </div>
                                        <div class="col-md-6">
                                        <h4><small>Reason of leave: </small>{{ $employees->leave->reason }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @endif    
                       

                       <div class="row">
                    
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header custom-card-header-2">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="m-0">Deductions</h4>
                                            <button wire:click="openAddDeductionModal()" class="btn btn-primary btn-sm" href="#"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($emp_deduction as $emp_d)
                                            <div class="card shadow">
                                                <div class="card-header">
                                                    <div class="d-flex justify-content-between">
                                                        <h4 class="m-0">{{ $emp_d->deduction->deduction_name }}</h4>
                                                        <button wire:click="openAddAllowanceModal()" class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                    
                                                </div>
                                                <div class="card-body carbody">
                                                    
                                                        <p><small>{{ $emp_d->deduction->description }}</small></p>
                                                        <p><small>
                                                            @if ($emp_d->type == 1)
                                                                Type: Monthly
                                                            @elseif ($emp_d->type == 2)
                                                                Type: Weekly
                                                            @elseif ($emp_d->type = 3)
                                                                Type: Daily
                                                            @elseif ($emp_d->type = 4)
                                                                Type: Once
                                                            @endif
                                                        </small>
                                                        </p>
                                                        <p><small>Amount: {{ $emp_d->amount }}</small></p>
                                                    
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
        
               
            </div>
        </div>
    </div>
    
    {{-- ADD deduction MODAL START --}}
    <div class="modal fade addDeductionModal"wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title w-100 text-center h4" id="staticBackdropLabel">Add Deduction</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="addDeduction">
              <div class="modal-body">
                <div class="form-group">
                    <label>Deduction</label>
                    <select class="form-control" wire:model="deduction_id">
                        <option value="" >-- Select Deductions below</option>
                        @foreach($deduction as $ded)
                        <option value="{{$ded->id}}">{{$ded->deduction_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" wire:model="type">
                        <option value="" >-- Select Type below</option>
                        <option value="1">Monthly</option>
                        <option value="2">Weekly</option>
                        <option value="3">Daily</option>
                        <option value="4">Once</option>  
                    </select>
                </div>

                <div class="form-group">
                  <label>Amount</label>
                  <input type="text" class="form-control" placeholder="Enter the amount of the allowance" wire:model="amount">
                  {{-- <span class="text-danger">@error('service_fee'){{ $message }}@enderror</span> --}}
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
              </div>
            </form>
          </div>
        </div>
    </div>
      {{-- ADD deduction MODAL END --}}
</div>
