<div>
    <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="card">
                    <div class="card-header">
                        <span>
                            <strong>Attendance</strong>
                            <a href="{{ route('admin.add-attendance') }}" class="btn btn-primary btn-sm col-md-2 float-right"><i class="fas fa-plus"></i> Add Atendance</a>
                        </span>
                    </div>  
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="services_table">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Employee No.</th>
                                    <th>Name</th>
                                    <th>Time-in</th>
                                    <th>Time-out</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($attendance as $a)
                                <tr>
                                    <td>{{ $a->created_at }}</td>
                                    <td>{{ $a->employee->employee_id }}</td>
                                    <td>{{ $a->employee->name }}</td>
                                    <td>{{ date("h:i a", strtotime($a->time_in)) }}</td>
                                    <td>{{ date("h:i a", strtotime($a->time_out)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit-attendance', ['attendance_id' =>$a->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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
  