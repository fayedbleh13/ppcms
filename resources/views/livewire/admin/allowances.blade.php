<div>
    <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                  <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4>Allowance</h4>
                            <a href="{{ route('admin.add-allowance') }}" class="btn btn-sm btn-primary">Add Allowance</a>
                        </div>
                    </div>  
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="services_table">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Name</th>
                                    <!--<th>Image</th>-->
                                    <th>Description</th>
                                    <!--<th>Fee</th>-->
                                    <th>Date added</th>
                                    <th width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allowance as $a)
                                    <tr>
                                        <td>{{ $a->allowance_name }}</td>
                                        <td>{{ $a->description }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit-allowance', ['allowance_id' => $a->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
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
  