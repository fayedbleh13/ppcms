<div>
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
                <div class="card">
                    <div class="div card-header">
                        <div class="d-flex justify-content-between">
                            <h4>Deductions</h4>
                            <a href="/admin/add-deduction" class="btn btn-sm btn-primary">Add new Deductions</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="deductions_table">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Deduction Name</th>
                                    <th>Deduction Description</th>
                                    <th>Date Added</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deduction as $d)
                                    <tr>
                                        <td>{{ $d->deduction_name }}</td>
                                        <td>{{ $d->description }}</td>
                                        <td>{{ $d->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit-deduction', ['deduction_id'=>$d->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
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
