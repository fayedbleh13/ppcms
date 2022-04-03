<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid mt-3">
                <div class="mb-4">
                    <a class="btn btn-secondary btn-lg" href="{{ route('admin.order-list') }}">Back to Orders List</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        @if ($order->order_type == 'online')
                            <h1 class="m-0">Ordered Items (Online)</h1>
                        @else
                            <h1 class="m-0">Ordered Items (Offline)</h1>
                        @endif
                        
                    </div>
                    <div class="card-body">
                        <article class="card-body">
                                <div class="row">
                                    @foreach ($order->orderItem as $item)
                            
                                    <div class="col-md-6">
                                        <figure class="itemside  mb-3">
                                            <div class="aside"><img src="{{ asset('img')}}/{{ $item->product->image }}"  alt="{{ $item->product->name }}" class="border img-sm"></div>
                                            <figcaption class="info">
                                                <p>{{ $item->product->name }}</p>
                                                <span>{{ $item->quantity }}x {{ $item->price }} = Total: {{ $item->price * $item->quantity }} </span>
                                            </figcaption>
                                        </figure>
                                    </div> <!-- col.// -->

                                    @endforeach
                                </div> <!-- row.// -->
                        </article> <!-- card-body.// -->
                        <article class="card-body border-top">
                    
                            <dl class="row">
                                <dt class="col-sm-10">Subtotal:</dt>
                                <dd class="col-sm-2 text-right"><strong>{{ $order->subtotal }}</strong></dd>
                    
                                <dt class="col-sm-10">Discount:</dt>
                                <dd class="col-sm-2 text-danger text-right"><strong>{{ $order->discount }}</strong></dd>
                    
                                <dt class="col-sm-10">Tax:</dt>
                                <dd class="col-sm-2 text-right text-success"><strong>{{ $order->tax }}</strong></dd>

                                <dt class="col-sm-10">Amount Paid:</dt>
                                <dd class="col-sm-2 text-right text-warning"><strong>{{ $order->payment }}</strong></dd>
                    
                                <dt class="col-sm-10">Total:</dt>
                                <dd class="col-sm-2 text-right"><strong class="h5 text-dark">{{ $order->total }}</strong></dd>

                                <dt class="col-sm-10">Change:</dt>
                                <dd class="col-sm-2 text-right"><strong>{{ $order->change }}</strong></dd>
                            </dl>
                    
                        </article> <!-- card-body.// -->
                    </div>
                </div>
                @if ($order->order_type == 'online')
                    <div class="card">
                        <div class="card-header">
                            <h1 class="m-0">Billing Details</h1>
                        </div>
                        <div class="card-body">
                            <table class="table" style="table-layout: fixed; width: 100%">
                                
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $order->firstname }}</td>
                                    <th>Last name</th>
                                    <td>{{ $order->lastname }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile Number</th>
                                    <td>{{ $order->mobile }}</td>
                                    <th>Email</th>
                                    <td>{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $order->address }}</td>
                                    <th>City</th>
                                    <td>{{ $order->city }}</td>
                                </tr>
                                <tr>
                                    <th>Province</th>
                                    <td>{{ $order->province }}</td>
                                    <th>Zipcode</th>
                                    <td>{{ $order->zipcode }}</td>
                                </tr>
                                
                                
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            <h1 class="m-0">Billing Details</h1>
                        </div>
                        <div class="card-body">
                            <table class="table" style="table-layout: fixed; width: 100%">
                                
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{ $order->firstname }}</td>
                                </tr>
                                <tr>
                                    <th>Cashier</th>
                                    <td>{{ $order->user->name }}</td>
                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif
                
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

                <div class="card">
                    <div class="card-header">
                        <h1 class="m-0">Transactions</h1>
                    </div>
                    <div class="card-body">
                        <table class="table" style="table-layout: fixed; width: 100%">
							
                            <tr>
                                <th>Transaction Code</th>
                                <td>{{ $order->transaction->transaction_code }}</td>
                            </tr>
                            <tr>    
                                <th>Payment Mode</th>
                                <td>{{ $order->transaction->payment_mode }}</td>
                            </tr>
                            <tr>
                                <th>Transaction Status</th>
                                <td>
                                    @if($order->transaction->trans_status == 'pending')
                                        <span class="badge badge-primary">Pending</span>
                                    @elseif ($order->transaction->trans_status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @elseif ($order->transaction->trans_status == 'declined')
                                        <span class="badge badge-danger">Declined</span>
                                    @else
                                        <span class="badge badge-warning">Refunded</span>
                                    @endif
                                </td>            
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{ $order->transaction->created_at }}</td>
                            </tr>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
