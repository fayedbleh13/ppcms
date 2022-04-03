<div class="container mt-5">

        <!-- =========================  COMPONENT MYORDER 1 ========================= --> 
        <div class="row">
          <aside class="col-md-3">
            <!--   SIDEBAR   -->
            <ul class="list-group border shadow">
                <a class="list-group-item" href="{{ route('user.dashboard') }}">User Dashboard</a>
                <a class="list-group-item" href="{{ route('user.orders') }}"> Current orders </a>
                <a class="list-group-item" href="{{ route('user.orders-history') }}"> My Order history </a>
                <a class="list-group-item active" href="{{ route('user.bookings') }}"> Current Appointments </a>
                <a class="list-group-item" href="{{ route('user.bookings-history') }}"> Appointment History </a>
              
            </ul>
            <br>
            <a class="btn btn-light btn-block border shadow" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i> <span class="text">Log out</span>
            </a>
                             
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>  
            <!--   SIDEBAR .//END   -->
          </aside>
          <main class="col-md-9">

            <div class="row">
                @foreach ($bookings as $booh)
                    @if ($booh->booking_status == 0)
                        <div class="col-md-12 mb-3">
                            <article class="card border shadow">
                                <header class="card-header custom-card-header">
                                    <div class="d-flex justify-content-between">
                                        <strong class="d-inline-block">Appointment Reference ID: {{ $booh->reference_id }}</strong>
                                        <span class="ml-5" style="margin-left: 14em!important;">
                                            Date Requested: <strong>{{ date_format($booh->created_at,'d M Y') }} {{ date('h:i A', strtotime($booh->created_at)) }}</strong>
                                        </span>
                                        
                                        @if ($booh->booking_status == 0)
                                            <span class="badge badge-success" style="padding-top: 0.6em !important;">Status: Pending</span>
                                        @endif
                                </div>                          
                                </header>
                                <div class="card-body">
                                    <div class="row"> 
                                        <div class="col-md">
                                        
                                            <h5 class="text-muted">Scheduled by: <span class="font-weight-bold lead">{{ $booh->user->name }}<br> </h5>
                                            
                                            Type of Service: <strong>{{ $booh->service->name }}</strong><br>
                                            Description: <span class="lead">{{ $booh->service->description }}</span> <br>
                                            Booked Date and Time: <strong>{{ date_format($booh->created_at,'d M Y') }} {{ date('h:i A', strtotime($booh->created_at)) }}</strong><br> 
                                            <hr>
                                            <button wire:click="openCancelBookModal({{ $booh->id }})" class="btn btn-danger btn-block" href="#"><i class="fas fa-trash"></i> Cancel Appointment</button>
                                            </p>
                                        </div>
                                    </div> <!-- row.// -->
                                </div> <!-- card-body .// -->
                            </article>
                        </div>
                    @endif    
                @endforeach
                   
                
            </div> 
            
          </main>
        </div> <!-- row.// -->
        <!-- =========================  COMPONENT MYORDER 1 END.// ========================= --> 
        
        <br> <br>
    
 {{-- ADD allowance MODAL START --}}
 <div class="modal fade cancelBookModal"wire:ignore.self data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center h4" id="staticBackdropLabel">Cancel Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="cancelBookingStatus">
                <div class="modal-body">
                    <div class="text-center">
                        <h4>Are you sure you want to cancel you booking?</h4>
                    </div>
                    <input type="hidden" class="form-control" wire:model="booking_id">
                    <input type="hidden" class="form-control" wire:model="booking_status">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- ADD Allowance MODAL END --}}
</div>


    