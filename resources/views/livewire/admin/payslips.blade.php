<div>

	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" id="unpaid-tab" data-toggle="tab" href="#unpaid" role="tab" aria-controls="unpaid" aria-selected="true">Unpaid</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="paid-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="paid" aria-selected="true">Paid</a>
                    </li>
                  
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="unpaid" role="tabpanel" aria-labelledby="unpaid-tab">
                        <div class="card">
                            <div class="div card-header">
                                <div class="d-flex justify-content-between">
                                    <h3>Unpaid Payslips</h3>
                                    <a href="/admin/add-payslip" class="btn btn-sm btn-primary"><span class="btn-cust">Create New Payslip</span> </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-sm" id="leave_table" wire:ignore.self>
                                    <thead class="bg-dark text-center">
                                        <tr>
                                            <th>Reference No</th>
                                            <th>Date from</th>
                                            <th>Date to</th>
                                            <th>Status</th>
                                            <th>Date created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payslips as $ps)
                                            @if ($ps->payroll_status == 'unpaid')
                                                <tr class="text-center">
                                                    <td>{{ $ps->reference_id }}</td>
                                                    <td>{{ $ps->date_from }}</td>
                                                    <td>{{ $ps->date_to }}</td>
                                                    <td>
                                                        @if ($ps->payroll_status == 'paid')
                                                            <span class="badge badge-success">Paid</span>
                                                            
                                                        @else
                                                            <span class="badge badge-primary">Unpaid</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $ps->created_at }}</td>
                                                    <td>
                                                        <a href="#" wire:click="export({{ $ps->id }})" class="btn btn-sm btn-success"><i class="fas fa-file-export"></i></i></a>
                                                        <a href="{{ route('admin.edit-payslip', ['payroll_id' => $ps->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end of child tab -->
                    <div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                        <div class="card">
                            <div class="div card-header">
                                <div class="d-flex justify-content-between">
                                    <h3>Paid Payslips</h3>
                                    <a href="/admin/add-payslip" class="btn btn-sm btn-primary"><span class="btn-cust">Create New Payslip</span> </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-sm" id="leave_table" wire:ignore.self>
                                    <thead class="bg-dark text-center">
                                        <tr>
                                            <th>Reference No</th>
                                            <th>Date from</th>
                                            <th>Date to</th>
                                            <th>Status</th>
                                            <th>Date created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payslips as $ps)
                                            @if ($ps->payroll_status == 'paid')
                                                <tr class="text-center">
                                                    <td>{{ $ps->reference_id }}</td>
                                                    <td>{{ $ps->date_from }}</td>
                                                    <td>{{ $ps->date_to }}</td>
                                                    <td>
                                                        @if ($ps->payroll_status == 'paid')
                                                            <span class="badge badge-success">Paid</span>
                                                            
                                                        @else
                                                            <span class="badge badge-primary">Unpaid</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $ps->created_at }}</td>
                                                    <td>
                                                        <a href="#" wire:click="export({{ $ps->id }})" class="btn btn-sm btn-success"><i class="fas fa-file-export"></i></i></a>
                                                        <a href="{{ route('admin.edit-payslip', ['payroll_id' => $ps->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end of child tab 2 -->
                  </div>

				
			</div>
		</div>
	</div>
</div>
