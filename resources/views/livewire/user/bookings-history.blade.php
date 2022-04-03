<div class="container mt-5">

    <!-- =========================  COMPONENT MYORDER 1 ========================= --> 
    <div class="row">
      <aside class="col-md-3">
        <!--   SIDEBAR   -->
        <ul class="list-group border shadow">
            <a class="list-group-item" href="{{ route('user.dashboard') }}">User Dashboard</a>
            <a class="list-group-item" href="{{ route('user.orders') }}"> Current orders </a>
            <a class="list-group-item" href="{{ route('user.orders-history') }}"> My Order history </a>
            <a class="list-group-item" href="{{ route('user.bookings') }}"> Current Appointment </a>
            <a class="list-group-item active" href="{{ route('user.bookings-history') }}"> Appointment History </a>
          
        </ul>
        <br>
        <a class="btn btn-light btn-block border shadow" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                             
        <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
        </form> 
        <!--   SIDEBAR .//END   -->
      </aside>
      <main class="col-md-9">

        <div class="row mb-3">
            
                @foreach ($bookings as $booh)
                    @if($booh->booking_status >= 1)
                        <div class="col-md-12 mb-3">
                            <article class="card border shadow">
                                <header class="card-header custom-card-header">
                                    <div class="d-flex justify-content-between">
                                        <strong class="d-inline-block">Appointment Reference ID: {{ $booh->reference_id }}</strong>
                                        <span class="ml-5" style="margin-left: 14em!important;">
                                            Date Requested: <strong>{{ date_format($booh->created_at,'d M Y') }} {{ date('h:i A', strtotime($booh->created_at)) }}</strong>
                                        </span>
                                          
                                        @if ($booh->booking_status == 1)
                                            <span class="badge badge-success" style="padding-top: 0.6em !important;">Status: Approved</span>
                                        @elseif ($booh->booking_status== 2)
                                            <span class="badge badge-danger " style="padding-top: 0.6em !important;">Status: Canceled</span>
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
                                            </p>
                                        </div>
                                    </div> <!-- row.// -->
                                </div> <!-- card-body .// -->
                            </article>
                        </div>
                    @endif
                @endforeach
           
        </div>
        {{-- Pagination function --}}
        {{ $bookings->links() }}
      </main>
    </div> <!-- row.// -->
    <!-- =========================  COMPONENT MYORDER 1 END.// ========================= --> 
    
    <br> <br>


</div>
