<div>
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
                <div class="card">
                    <div class="div card-header">
                        <div class="d-flex justify-content-between">
                            <h4>Employee Leave List</h4>
                            <a href="/admin/add-leave" class="btn btn-sm btn-primary">Add new Leave</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="leave_table">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Employee name</th>
                                    <th>Leave start</th>
                                    <th>Leave end</th>
                                    <th>Status</th>
                                    <th>Reason</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leave as $l)
                                    <tr>
                                        <td>{{ $l->employee->name }}</td>
                                        <td>{{ $l->date_from }}</td>
                                        <td>{{ $l->date_to }}</td>
                                        <td>
                                            @if ($l->employee->status = 1)
                                                <span class="badge badge-info">On-Leave</span>
                                            @else
                                                <span class="badge badge-info">Active</span>
                                            @endif
                                        </td>
                                        <td>{{ $l->reason }}</td>
                                        <td>{{ $l->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit-leave', ['leave_id'=>$l->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
