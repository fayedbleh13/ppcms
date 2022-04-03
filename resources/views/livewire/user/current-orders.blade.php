<div>
  
    <div class="container mt-5">

        <!-- =========================  COMPONENT MYORDER 1 ========================= --> 
        <div class="row">
          <aside class="col-md-3">
            <!--   SIDEBAR   -->
            <ul class="list-group border shadow">
                <a class="list-group-item" href="{{ route('user.dashboard') }}">User Dashboard</a>
                <a class="list-group-item active" href="{{ route('user.orders') }}"> Current orders </a>
              <a class="list-group-item" href="{{ route('user.orders-history') }}"> My Order history </a>
              <a class="list-group-item" href="{{ route('user.bookings') }}"> Current Appointments </a>
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
            
                @foreach ($orders as $o)
                   
                        @if ($o->status <= 1 && $o->order_type == 'online' )
                            <div class="col-md-12 mb-4">
                                <article class="card border shadow">
                                    <header class="card-header custom-card-header">
                                        <div class="d-flex justify-content-between">
                                            <strong class="d-inline-block mr-5">Order ID: {{ $o->order_code }}</strong>
                                            <span class="ml-5" style="margin-left: 19em!important;">
                                                Date Ordered: <strong>{{ date_format($o->created_at,'d M Y') }} {{ date('h:i A', strtotime($o->created_at)) }}</strong>
                                            </span>
                                            @if ($o->status == 0)
                                            <span class="badge badge-info"style="padding-top: 0.6em !important; color: white !important; background-color: #17a2b8!important;">Status: Ordered</span>
                                            @elseif ($o->status == 1)
                                                <span class="badge badge-warning " style="padding-top: 0.6em !important;">Status: Delivering</span>
                                            @endif
                                            
                                        </div>     
                                    </header>
                                    <div class="card-body">
                                        <div class="row"> 
                                            <div class="col-md">
                                                <h5 class="text-muted">Ordered By: <span class="font-weight-bold lead">{{ $o->firstname }} {{ $o->lastname }}<br> </h5>
                                            
                                                    Phone: <strong>{{ $o->mobile }}</strong><br>
                                                    Email: <strong>{{ $o->email }}</strong><br>
                                                    Location: <span class="lead">{{ $o->line1 }} {{ $o->city }} {{ $o->province }}</span> <br>
                                                    Zip code: {{ $o->zipcode }}<br> 
                                                
                                                </p>
                                                <a href="{{ route('user.order-details',['order_id' => $o->id]) }}" class="btn btn-primary btn-block" style="color: white;">Full Details</a>
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
    
 
</div>
