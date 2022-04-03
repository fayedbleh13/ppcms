<div>
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Online orders</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Offline orders</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-sm" id="orders_table" style=" width: 100%">
                                    <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Order Code</th>
                                                <th>Date Ordered</th>
                                                <th>Total</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Actions</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            @if ($order->order_type == 'online')
                                            <tr> 
                                                <td>
                                                @if($order->status == 2)
                                                    <span class="badge badge-success">Delivered</span>
                                                @elseif ($order->status == 0)
                                                    <span class="badge badge-primary">Ordered</span>
                                                @else
                                                    <span class="badge badge-danger">Canceled</span>
                                                @endif
                                                </td>
                                                <td>{{ $order->order_code}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>₱ {{$order->total}}</td>
                                                <td>{{$order->firstname}}</td>
                                                <td>{{$order->lastname}}</td>
                                               
                                                <td><a href="{{ route('admin.order-details',['order_id' => $order->id]) }}" class="btn btn-info btn-sm">Details</a></td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div class="card">
                        <div class="card-body">
                            <table class="table" id="orders_table2" style=" width: 100%">
                                <thead>
                                        <tr>
                                            <th>Transaction Code</th>
                                            <th>Subtotal</th>
                                            <th>Tax</th>
                                            <th>Total</th>
                                            <th>First Name</th>
                                            <th>Order Type</th>
                                            <th>Date Purchased</th>
                                            <th>Actions</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        @if ($order->order_type == 'offline')
                                        <tr>
                                            <td>{{ $order->transaction->transaction_code}}</td>
                                            <td>₱ {{$order->subtotal}}</td>
                                            <td>₱ {{$order->tax}}</td>
                                            <td>₱ {{$order->total}}</td>
                                            <td>{{$order->firstname}}</td>
                                            <td>{{$order->order_type}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td><a href="{{ route('admin.order-details',['order_id' => $order->id]) }}" class="btn btn-info btn-sm">Details</a></td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div></div>
                </div>
			</div>
		</div>
	</div>
</div>
