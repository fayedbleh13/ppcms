<div>
  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="true">Services</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="report" aria-selected="false">Reports</a>
                    </li>
                   
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="services" role="tabpanel" aria-labelledby="services-tab">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h1>List of Services</h1>
                                    <a href="/admin/add-services" class="btn btn-sm btn-primary">Add new Service</a>
                                </div>
                            </div>
                            <div class="card-body">
                               
                                <table class="table table-bordered table-sm" id="services_table">
                                <thead class="bg-dark">
                                    <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date added</th>
                                    <th width="10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $s)
                                    <tr>
                                        
                                            <td>{{ $s->name }}</td>
                                            <td>{{ $s->description }}</td>
                                            <td>{{ date("M d Y", strtotime($s->created_at)) }}</td>
                                            <td>
                                            {{-- <buttonwire:click="editServices($s->id }})" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button> --}}
                                            <a href="{{ route('admin.edit-services', ['service_id'=>$s->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                       
                                    </tr>
                                    @endforeach 
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h1>Service Reports</h1>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="d-flex justify-content-end mb-2">
                                <button wire:click="openAddServiceModal()" class="btn btn-sm btn-primary">Add Service</button>
                                </div> --}}
                                <table class="table table-bordered table-sm" id="services_r">
                                <thead class="bg-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                
                                        <th>Total Services Used</th>
        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pro as $b)
                                           
                                            <tr>
                                                <td>{{ $b->service->name }}</td>
                                                <td>{{ $b->service->description }}</td>
                                                <td>{{ $b->total_services }}</td>
                                                
                                           
                                             </tr>
                                       
                                    @endforeach 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2" style="text-align: right; padding-right: 5px;">Total Services Scheduled: </th>
                                        <th> {{ $total }} Used</th>
                                        
                                    </tr>
                                </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

				
            </div>
        </div>
    </div>

    {{-- ADD SERVICE MODAL START --}}
    <div class="modal fade addServiceModal"wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title w-100 text-center h4" id="staticBackdropLabel">Add Services</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form wire:submit.prevent="addService">
            <div class="modal-body">
                <div class="form-group">
                <label>Service name</label>
                <input type="text" class="form-control" wire:model="name" placeholder="Enter service name here">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="" id="" cols="30" rows="3" wire:model="description" placeholder="Enter service description here"></textarea>
                <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" wire:model="image">
                @if($image)
                    <img src="{{$image->temporaryUrl()}}" width="120" alt="">
                @endif
                <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                <label>Service Fee</label>
                <input type="text" class="form-control" placeholder="Enter service fee here" wire:model="service_fee">
                <span class="text-danger">@error('service_fee'){{ $message }}@enderror</span>
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
    {{-- ADD SERVICE MODAL END --}}

    {{-- UPDATE SERVICE MODAL START --}}
    <div class="modal fade updateServiceModal" wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form wire:submit.prevent="updateService">
            <input type="hidden" name="">
            <div class="modal-body">
                <div class="form-group">
                <label>Service name</label>
                <input type="text" class="form-control" wire:model="name" placeholder="Enter service name here">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="" id="" cols="30" rows="3" wire:model="description" placeholder="Enter service description here"></textarea>
                <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" wire:model="newImg">
                {{-- @if($newImg)
                    <img src="{{$newImg->temporaryUrl()}}" width="120" alt="{{ $image }}">
                @else
                    <img src="{{asset('img/')}}/{{$image}}" width="120" alt="{{ $image }}">
                @endif
                <span class="text-danger">@error('newImg'){{ $message }}@enderror</span>
                </div> --}}

                <div class="form-group">
                <label>Service Fee</label>
                <input type="text" class="form-control" placeholder="Enter service fee here" wire:model="service_fee">
                <span class="text-danger">@error('service_fee'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Understood</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    {{-- UPDATE SERVICE MODAL END --}}
</div>
