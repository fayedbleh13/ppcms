<div>
  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				
				{{-- @if(Session::has('cat'))
					<div class="alert alert-success" role="alert">
						{{Session::get('cat')}}
					</div>
				@endif --}}
				
				<div class="card">
					<div class="card-header">
                        <div class="d-flex justify-content-between mb-2">
                             <h1>Employee List</h1>
							<button type="button" class="btn btn-sm btn-primary mt-2" wire:click="openAddEmployeeModal">Add new Employee</button>
						</div>
					</div>
					<div class="card-body">
            
						<table class="table table-bordered table-sm" id="employee_table">
							<thead class="bg-dark">
								<tr>
                                    <th>Date Account Added</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Job</th>
                                    <th>Contact</th>
                                    <th>Salary Rate</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $e)
                                    <tr>
                                        <td>{{ $e->created_at }}</td>
                                        <td>{{ $e->employee_id }}</td>
                                        <td>{{ $e->name }}</td>
                                        <td>{{ $e->job_type }}</td>
        
                                        <td>{{ $e->mobile }}</td>
                                        <td>
                                            @if ($e->salary_rate == 0)
                                            <span class="badge badge-info">Per Services</span>
                                            @else
                                            ₱ {{ $e->salary_rate }}
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.employee-details',['emp_id' => $e->id]) }}" class="btn btn-info btn-sm"><i class="far fa-eye"></i></a>
                                            <button type="button" class="btn btn-sm btn-primary" wire:click="editEmployee({{ $e->id }})"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger" wire:click="deleteEmployee({{ $e->id }})"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @endforeach		
                            </tbody>
                        </table>
                    </div>

        {{-- ADD EMPLOYEE MODAL START --}}
				<div class="modal fade addEmployeeModal" wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title w-100 text-center h4" id="staticBackdropLabel">Add Employee</h5>
							</div>
							<form wire:submit.prevent="AddEmployee">
								<div class="modal-body">

                                    <div class="form-group">
										<label>Designation</label>
										<select class="form-control" wire:model="user_id">
                                            <option value="" >-- Select designation</option>
                                            @foreach($users as $user)
                                                @if ($user->user_type != 'ADM')
                                                <option value="{{$user->id}}">{{ $user->user_type }} - {{$user->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
										<span class="text-danger">@error('job_type') {{ $message }}@enderror</span>
									</div>

									<div class="form-group">
										<label>Full name</label>
										<input type="text" class="form-control" placeholder="Enter full name" wire:model="name">
										<span class="text-danger">@error('name') {{ $message }}@enderror</span>
									</div>

									<div class="form-group">
										<label>Job type</label>
										<select class="form-control" wire:model="job_type">
                                            <option value="">Select job type</option>
                                            <option value="mechanic">Mechanic</option>
                                            <option value="cashier">Cashier</option>
                                            <option value="courier">Courier</option>
                                        </select>
										<span class="text-danger">@error('job_type') {{ $message }}@enderror</span>
									</div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label>Email</label>
                                                <input type="email" class="form-control" wire:model="email" placeholder="Enter email">
                                                <span class="text-danger">@error('email') {{ $message }}@enderror</span>
                                            </div>
                                            <div class="col">
                                                <label>Contact no.</label>
                                                <input type="text" class="form-control" wire:model="mobile" placeholder="Enter contact no.">
                                                <span class="text-danger">@error('mobile') {{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label>Gender</label>
                                                <select class="form-control" wire:model="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                <span class="text-danger">@error('gender') {{ $message }}@enderror</span>
                                            </div>
                                            <div class="col">
                                                <label>Salary Rate</label>
                                                <input type="text" class="form-control" wire:model="salary_rate" placeholder="Enter salary rate">
                                                <span class="text-danger">@error('salary_rate') {{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
								</div>
								<div class="modal-footer">
									<button type="submit" class="w-100 btn btn-sm btn-success">Add Employee</button>
                  <button type="button" class="w-100 btn btn-sm btn-danger" data-dismiss="modal">Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>
        {{-- ADD EMPLOYEE MODAL END --}}

        {{-- UPDATE EMPLOYEE MODAL START --}}
        <div class="modal fade updateEmployeeModal" wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title w-100 text-center h4" id="staticBackdropLabel">Update Employee</h5>
              </div>
              <form wire:submit.prevent="updateEmployee">
            <div class="modal-body">
                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" class="form-control" placeholder="Enter full name" wire:model="name">
                    <span class="text-danger">@error('name') {{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                    <label>Job type</label>
                    <select class="form-control" wire:model="job_type">
                      <option selected disabled>Select job type</option>
                      <option value="mechanic">Mechanic</option>
                      <option value="cashier">Cashier</option>
                      <option value="courier">Courier</option>
                    </select>
										<span class="text-danger">@error('job_type') {{ $message }}@enderror</span>
									</div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" wire:model="email" placeholder="Enter email">
                    <span class="text-danger">@error('email') {{ $message }}@enderror</span>
                  </div>

                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" wire:model="gender">
                      <option selected disabled>Select gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                    <span class="text-danger">@error('gender') {{ $message }}@enderror</span>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col">
                        <label>Contact no.</label>
                        <input type="text" class="form-control" wire:model="mobile" placeholder="Enter contact no.">
                        <span class="text-danger">@error('mobile') {{ $message }}@enderror</span>
                      </div>
                    </div>
                  </div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="w-100 btn btn-sm btn-primary">Update Employee</button>
                  <button type="button" class="w-100 btn btn-sm btn-danger" data-dismiss="modal">Close</button>
								</div>
							</form>
            </div>
          </div>
        </div>
        {{-- UPDATE EMPLOYEE MODAL END --}}
			</div>
		</div>
	</div>
</div>
</div>
