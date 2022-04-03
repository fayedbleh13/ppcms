
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid mt-4">
                    <div class="mb-4">
                        @if ($order->status <= 1)
                            <a class="btn btn-secondary btn-lg" href="{{ route('delivery.dashboard') }}">Back to Current Orders</a>
                        @elseif ($order->status == 2)
                            <a class="btn btn-secondary btn-lg" href="{{ route('delivery.history') }}">Back to Orders History</a>
                        @else
                            <a class="btn btn-secondary btn-lg" href="{{ route('delivery.history') }}">Back to Orders History</a>
                        @endif
                        
                    </div>
                    <div class="row mb-5">
                        <div class="col-md">
                            <article class="card border shadow">
                                <header class="card-header custom-card-header">
                                    <div class="d-flex justify-content-between">
                                        <strong class="d-inline-block">Order ID: {{ $order->order_code }}</strong>
                                        <span>
                                            Date Ordered: <strong>{{ date_format($order->created_at,'d M Y') }} {{ date('h:i A', strtotime($order->created_at)) }}</strong>
                                        </span>
                                        @if ($order->status == 0)
                                            <span class="badge badge-info"style="padding-top: 0.6em !important; color: white !important; background-color: #17a2b8!important;">Status: Ordered</span>
                                        @elseif ($order->status == 1)
                                            <span class="badge badge-warning " style="padding-top: 0.6em !important;">Status: Delivering</span>
                                        @elseif ($order->status == 2)
                                            <span class="badge badge-success " style="padding-top: 0.6em !important;">Status: Delivered</span>
                                        @elseif ($order->status == 3)
                                            <span class="badge badge-danger " style="padding-top: 0.6em !important;">Status: Canceled</span>
                                        @endif
                                    
                                    </div>  
                                </header>
                                <div class="card-body">
                                    <article class="card">
                                        <div class="card-body row no-gutters">
                                            <div class="col-md-4">
                                                <strong> Billing Info:</strong> <br>
                                                {{ $order->firstname }} {{ $order->lastname }}
                                                <br>
                                                {{ $order->mobile }} 
                                                <br>
                                                {{ $order->email }}
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Deliver Address:</strong> <br> 
                                                {{ $order->line1 }}  
                                                <br>
                                                {{ $order->city }} {{ $order->province }} {{ $order->zipcode }}

                                            </div>
                                            <div class="col-md-4">
                                                
                                                <strong>Payment Info:</strong> <br>
                                                <strong class="mr-3">Subtotal -</strong> ₱ {{ $order->subtotal }}
                                                <br>
                                                <strong class="mr-2 ">Discount - &nbsp</strong>₱ {{ $order->discount }}
                                                <br>
                                                <strong class="mr-5">Tax - &nbsp</strong> ₱ {{ $order->tax }}
                                                <br>
                                                <strong class="mr-4"> Total - &nbsp &nbsp</strong>₱ {{ $order->total }}
                                            </div>
                                        </div>
                                    </article>
                                    
                                    <hr>
                                    @if ($order->status >= 2)
                                        <h3 class="mb-4"><strong>Purchased Items</strong></h3>
                                    @else
                                        <h3 class="mb-4"><strong>Ordered Items</strong></h3>
                                    @endif
                                    

                                    <ul class="row">
                                        @foreach ($order->orderItem as $item)

                                            <li class="col-md-4">
                                                <figure class="itemside  mb-3">
                                                    <div class="aside"><img src="{{ asset('img')}}/{{ $item->product->image }}"  alt="{{ $item->product->name }}" class="img-sm border"></div>
                                                    <figcaption class="info align-self-center">
                                                        <p class="title">{{ $item->product->name }} </p>
                                                        <span class="text-muted">₱ {{ $item->price }} </span>
                                                    </figcaption>
                                                </figure> 
                                            </li>

                                        @endforeach
                                    </ul>

                                    <hr>

                                    <div class="tracking-wrap">
                                        @if ($order->status == 1)
                                            <div class="step active">
                                                <span class="icon"> <i class="fa fa-check"></i> </span>
                                                <strong><span class="text">Ordered</span></strong>
                                            </div> <!-- step.// -->
                                            <div class="step active">
                                                <span class="icon"> <i class="fas fa-motorcycle"></i> </span>
                                                <strong><span class="text"> Delivering</span></strong>
                                            </div> <!-- step.// -->
                                            <div class="step">
                                                <span class="icon"> <i class="fa fa-box"></i> </span>
                                                <strong><span class="text">Delivered</span></strong>
                                            </div> <!-- step.// -->
                                        @elseif ($order->status == 2)
                                            <div class="step active">
                                                <span class="icon"> <i class="fa fa-check"></i> </span>
                                                <strong><span class="text">Ordered</span></strong>
                                            </div> <!-- step.// -->
                                            <div class="step active">
                                                <span class="icon"> <i class="fas fa-motorcycle"></i> </span>
                                                <strong><span class="text"> Delivering</span></strong>
                                            </div> <!-- step.// -->
                                            <div class="step active">
                                                <span class="icon"> <i class="fa fa-box"></i> </span>
                                                <strong><span class="text">Delivered</span></strong>
                                            </div> <!-- step.// -->
                                        @elseif ($order->status == 3)
                                            <div class="step active">
                                                <span class="icon"> <i class="fa fa-check"></i> </span>
                                                <strong><span class="text">Ordered</span></strong>
                                            </div> <!-- step.// -->
                                            <div class="step active">
                                                <span class="icon"> <i class="fas fa-motorcycle"></i> </span>
                                                <strong><span class="text"> Delivering</span></strong>
                                            </div> <!-- step.// -->
                                            <div class="step active">
                                                <span class="icon"> <i class="fas fa-ban"></i> </span>
                                                <strong><span class="text">Canceled</span></strong>
                                            </div> <!-- step.// -->
                                        @else
                                            <div class="step active">
                                                <span class="icon"> <i class="fa fa-check"></i> </span>
                                                <strong><span class="text">Ordered</span></strong>
                                            </div> <!-- step.// -->
                                            <div class="step">
                                                <span class="icon"> <i class="fas fa-motorcycle"></i> </span>
                                                <strong><span class="text"> Delivering</span></strong>
                                            </div> <!-- step.// -->
                                            <div class="step">
                                                <span class="icon"> <i class="fa fa-box"></i> </span>
                                                <strong><span class="text">Delivered</span></strong>
                                            </div> <!-- step.// -->
                                        @endif
                                        
                                        
                                    </div>
                                    <span class="text-danger">@error('status') {{ $message }}@enderror</span>
                                    <form wire:submit.prevent="confirm">
                                        <div class="form-group">
                                            <label for="sel1">Update Delivery Status:</label>
                                            <select class="form-control" wire:model="status">
                                                <option value="">Select Status..</option>
                                                <option value="1">Delivering</option>
                                                <option value="2">Delivered</option>
                                                <option value="">Canceled</option>
                                            </select>
                                            <span class="text-danger">@error('status') {{ $message }}@enderror</span>
                                        </div>
                                        @if ($order->status == 2)
                                            <button type="submit" class="btn btn-primary btn-block" disabled>Update  nStatus</button>
                                        @elseif ($order->status == 3)
                                            <button type="submit" class="btn btn-primary btn-block" disabled>Update Status</button>
                                        @else
                                            <button type="submit" class="btn btn-primary btn-block">Update Status</button>
                                        @endif
                                       
                                    </form>
                                </div> <!-- card-body.// -->
                            </article>
                        </div>
                        
                    </div>
                    
                    
                    @if ($order->is_shipping_different)
                        
                    <div class="card">
                        <div class="card-header">
                            <h1 class="m-0">Shipping Details</h1>
                        </div>
                        <div class="card-body">
                            <table class="table" style="table-layout: fixed; width: 100%">
                                
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $order->shipping->firstname }}</td>
                                    <th>Last name</th>
                                    <td>{{ $order->shipping->lastname }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile Number</th>
                                    <td>{{ $order->shipping->mobile }}</td>
                                    <th>Email</th>
                                    <td>{{ $order->shipping->email }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $order->shipping->address }}</td>
                                    <th>City</th>
                                    <td>{{ $order->shipping->city }}</td>
                                </tr>
                                <tr>
                                    <th>Province</th>
                                    <td>{{ $order->shipping->province }}</td>
                                    <th>Zipcode</th>
                                    <td>{{ $order->shipping->zipcode }}</td>
                                </tr>
                                
                                
                            </table>
                        </div>
                    </div>
    
                    @endif
    
                </div>
            </div>
        </div>
    </div>
