<div class="container mb-5">
    <div class="row mt-4">
        <div class="d-flex justify-content-between mb-2 col-md-12 col-lg-12">
            <h2 class="display-5">Delivery History</h2>
            <a href="{{ route('delivery.dashboard') }}" class="btn btn-secondary btn-lg">Back to Orders</a>
       </div>
    </div>

    <div class="row mt-4">
        @foreach ($orders as $o)
            @if ($o->order_type == 'online')
                @if ($o->status >= 2)
                    
                <div class="col-md-12 mb-4">
                    <article class="card border shadow">
                        <header class="card-header custom-card-header">
                            <div class="d-flex justify-content-between">
                                <strong class="d-inline-block">Order ID: {{ $o->order_code }}</strong>
                                <span class="ml-0">
                                    Date Ordered: <strong>{{ date_format($o->created_at,'d M Y') }} {{ date('h:i A', strtotime($o->created_at)) }}</strong>
                                </span>
                                @if ($o->status == 2)
                                    <span class="badge badge-success"style="padding-top: 0.6em !important;">Status: Delivered</span>
                                @elseif ($o->status == 3)
                                    <span class="badge badge-danger " style="padding-top: 0.6em !important;">Status: Canceled</span>
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
                                    <a href="{{ route('delivery.order-details',['order_id' => $o->id]) }}" class="btn btn-primary btn-block" style="color: white;">Full Details</a>
                                </div>
                            </div> <!-- row.// -->
                        </div> <!-- card-body .// -->
                    </article>
                </div>
                @endif
            @endif
        @endforeach
    </div>

</div>

