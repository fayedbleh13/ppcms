<div>
  
    <div class="container mt-5">

        <!-- =========================  COMPONENT MYORDER 1 ========================= --> 
        <div class="row">
          <aside class="col-md-3">
            <!--   SIDEBAR   -->
            <ul class="list-group shadow">
                {{-- @if ($orders == Null)
                    <a class="list-group-item active" href="{{ route('user.dashboard')}}"> User Dashboard </a>
                @else
                    <a class="list-group-item active" href="{{ route('user.dashboard')}}"> User Dashboard </a>
                @endif --}}
                <a class="list-group-item active" href="{{ route('user.dashboard')}}"> User Dashboard </a>
                <a class="list-group-item" href="{{ route('user.orders') }}"> Current orders </a>
                <a class="list-group-item " href="{{ route('user.orders-history') }}"> My Order history </a>
                 <a class="list-group-item" href="{{ route('user.bookings') }}"> Current Appointments </a>
                <a class="list-group-item" href="{{ route('user.bookings-history') }}"> Appointment History </a>
              
              
            </ul>
            <br>
            <a class="btn btn-light btn-block shadow" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i> <span class="text">Log out</span>
            </a>
                             
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
            </form> 
            <!--   SIDEBAR .//END   -->
          </aside>
          <main class="col-md-9">
            <div class="row">
                <div class="col-6">
                    <div class="card border-info mb-3 shadow border" >
                        <div class="card-header">
                            <h4 class="font-weight-bold">{{ $orders }}</h4>
                            <h4 class="card-title mr-5">Current Active Orders</h4>
                            
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary btn-block" href="{{ route('user.orders') }}">Check here <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card border-info mb-3 shadow border" >
                        <div class="card-header">
                            <h4 class="font-weight-bold">{{ $appointment }}</h4>
                            <h4 class="card-title mr-5">Pending Appointments</h4>
                            
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary btn-block" href="{{ route('user.bookings') }}">Check here <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card border shadow">
                <div class="card-body">
                <h3 class="card-title mb-4 font-weight-bold">Profile</h3>
               
               <form wire:submit.prevent="updateProfile">
                   <div class="form-row mb-3">
                        <div class="col-12 form-group" style="padding-left: 5em;">
                            @if ($newImg)
                                <img src="{{ $newImg->temporaryUrl() }}" class="img-md rounded-circle border border-dark shadow">
                            @elseif ($profile_pic )
                                <img src="{{ asset('assets/images/profile') }}/{{ $user->profile_photo_path }}" class="img-md rounded-circle border border-dark shadow">
                            @else
                                <img src="{{ asset('images/default.png') }}" class="img-md rounded-circle border border-dark shadow">
                            @endif
                        
                        </div>
                        <div class="col form-group mt-3">
                            <label>Upload new Profile Photo</label>
                            <input type="file" class="form-control-file" wire:model='newImg'>
                        </div> <!-- form-group end.// -->
                   </div>
                   
                   
                    <div class="form-row">
                        <div class="col form-group">
                            <label>First Name</label>
                                <input type="text" class="form-control" pwa2-uuid="EDITOR/input-708-915-C2DFE-67D" pwa-fake-editor="" wire:model='firstname'>
                        </div> <!-- form-group end.// -->
                        <div class="col form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" pwa2-uuid="EDITOR/input-708-915-C2DFE-67D" pwa-fake-editor="" wire:model='lastname'>
                            </div> <!-- form-group end.// -->
                        
                    </div> <!-- form-row.// -->
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" wire:model='email'>
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" pwa2-uuid="EDITOR/input-1DD-4C3-DF77E-E03" pwa-fake-editor="" wire:model='mobile'>
                        </div> <!-- form-group end.// -->
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Address</label>
                            <input type="text" class="form-control" wire:model='line1'>
                        </div> <!-- form-group end.// -->
                        
                    </div> <!-- form-row.// -->
            
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>City</label>
                            <input type="text" class="form-control" pwa2-uuid="EDITOR/input-7D9-7E9-94F12-36D" pwa-fake-editor="" wire:model='city'>
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-4">
                            <label>Province</label>
                            <input type="text" class="form-control" pwa2-uuid="EDITOR/input-7D9-7E9-94F12-36D" pwa-fake-editor="" wire:model='province'>
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-4">
                            <label>Zipcode</label>
                            <input type="text" class="form-control" value="123009" pwa2-uuid="EDITOR/input-6D2-D20-DB6B2-B10" pwa-fake-editor="" wire:model='zipcode'>
                        </div> <!-- form-group end.// -->
                        
                    </div> <!-- form-row.// -->
            
                    <button class="btn btn-primary btn-block">Update Info</button>
                </form>
                </div> <!-- card-body.// -->
              </div>
            
          </main>
        </div> <!-- row.// -->
        <!-- =========================  COMPONENT MYORDER 1 END.// ========================= --> 
        
        <br> <br>
    
 
</div>
