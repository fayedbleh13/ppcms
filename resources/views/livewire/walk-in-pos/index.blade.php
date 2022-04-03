<div class="container-fluid mt-4 mb-4">  
    <form wire:submit.prevent="placeOrder">
			@if(Session::has('pro'))
					<div class="alert alert-success" role="alert">
							{{Session::get('pro')}}
					</div>
				@endif
        <div class="row">
        <header class="mt-1">
            <div class="form-inline mb-3" style="margin-left: 14px;">
                <div class="row">
                    <form action="{{ route('product.search') }}" name="form-search" >
                        <div class="col input-group" >
                            <input type="text" name="search" value="" class="form-control" placeholder="Search Products here.." wire:model="searchTerm">
                            <div class="input-group-append">
                            <button class="btn btn-primary" name="form-search" type="submit" >
                                <i class="fa fa-search"></i>
                            </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-block" style="margin-left: 15.7em;" data-toggle="modal" data-target="#exampleModal">
                            Transaction History
                        </button>
                    </div>
                </div>
                

                
            </div>
            <div class="form-inline" style="margin-left: 500px">
                <!-- Button trigger modal -->
           
            </div>
        </header><!-- sect-heading -->
        
        <section class="section-content col-md-7" >
            <div class="container  shadow" style="height: 55.2em; overflow-y: auto;">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($products as $product )
                                @if($product->stock_status)
                                    <div class="col-md-4" >
                                        <figure class="itemside  mb-4">
                                            <div class="aside"><img class="border img-sm" src="{{ asset('img/')}}/{{ $product->image }}" alt="{{ $product->name }}"></div>
                                            <figcaption class="info align-self-center">
                                                <p class="title lead">{{ $product->name }}</p>
                                                <button class="btn btn-primary btn-sm" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', '{{ $product->regular_price }}' )">Select </button>
                                            </figcaption>
                                        </figure>
                                    </div> <!-- col.// -->
                                @endif
                            @endforeach
                        </div> <!-- row.// -->
                    </div>
                </div>
            </div>
        </section>

        <section class="section-content col-md-5 " style="margin-top: -4em;">

                <div class="card border overflow-auto shadow" style="height: 3.5in; max-width: 5000px!important;">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr>
                                <th class="border" colspan="4" style="text-align: center;  background: rgb(237, 237, 238) !important;">Purchase Items</th>
                            </tr>
                            <tr class="small text-uppercase" style="text-align: center">
                                <th scope="col" >Product</th>
                                <th scope="col" width="170">Quantity</th>
                                <th scope="col" width="150">Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::instance('pos')->content() as $item)
                                <tr style="text-align: center">
                                    <td>
                                        <div>
                                            <h6 style="font-weight: bolder">{{ $item->model->name }}</h6>
                                        </div>
                                        
                                    </td>
                                    <td> 
                                        <div class="input-group input-spinner">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-sm btn-primary" type="button" id="button-minus" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"> <i class="fa fa-minus"></i> </button>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $item->qty }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-primary" type="button" id="button-plus" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"> <i class="fa fa-plus"></i> </button>  
                                            </div>
                                        </div>
                                    </td>
                                    <td> 
                                        <div class="price-wrap"> 
                                            <var class="price">₱{{ $item->priceTotal() }}</var> 
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-left" style="text-align: left!important;"> 
                                        <a href="" class="btn btn-danger" wire:click.prevent="deleteItem('{{ $item->rowId }}')"><i class="fas fa-times-circle"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                
                    <!--<div class="card-body border-top">
                        <a href="#" class="btn btn-primary float-md-right" wire:click.prevent="checkout"> Checkout <i class="fa fa-chevron-right"></i> </a>
                        <a href="#" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
                        <a href="#" class="btn btn-primary " wire:click.prevent="deleteAll"> Clear Cart  </a>
                    </div>-->
                </div> <!-- card.// -->
                
                <!--<div class="alert alert-success mt-3">
                        <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
                </div>-->
                
                <div class="card border mt-3 shadow">
                    <div class="checkout-info p-3">
                        <label for="" class="checkbox-field">
                            <input type="checkbox" name="have-code" id="have-code" class="frm-input" value="1" wire:model="myCouponCode"><span> I have a coupon code</span>
                        </label>
                    </div>
                    
                    @if (!Session::has('coupon'))
                        @if ($myCouponCode == 1)
                            <div class="card-body">
                                <form wire:submit.prevent="addCoupon">
                                    <div class="form-group">
                                        @if(Session::has('coupon_msg'))
                                        <div class="alert alert-danger" role="danger">
                                            {{Session::get('coupon_msg')}}
                                        </div>
                                        @endif
                                        <label>Have coupon? enter it here.</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="coupon-code" placeholder="Coupon code" wire:model="thisCouponCode">
                                            <span class="input-group-append"> 
                                                <button class="btn btn-primary" type="submit">Apply</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- card-body.// -->
                        @endif
                    @endif
                </div>  <!-- card .// -->

                <div class="card border mt-3 shadow">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="paymentInput">Name:</label>
                            <input type="text" class="form-control" placeholder="Name"  wire:model="name">
                        </div>
                        <div class="form-group">
                            <label for="paymentInput">Payment:</label>
                            <input type="number" class="form-control" id="paymentInput" placeholder="Payment" wire:model="payment">
                            {{-- <span class="text-danger">@error('payment')
                                {{ $message }}
                              @enderror</span> --}}
                        </div>
                    </div>
                </div>

                <div class="card border mt-3 shadow">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>SubTotal:</dt>
                            <dd class="text-right">₱{{ Cart::instance('pos')->subtotal() }}</dd>
                        </dl>
                    @if (Session::has('coupon'))
                        <dl class="dlist-align">
                            <dt>Discount: ({{ Session::get('coupon')['code'] }})</dt>
                            <dd class="text-right">-₱{{ number_format($discount,2) }}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>SubTotal with Discount:</dt>
                            <dd class="text-right">₱{{ number_format($subtotalAfterDiscount,2) }}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Vat: ({{ config('cart.tax') }}%)</dt>
                            <dd class="text-right">₱{{ number_format($taxAfterDiscount,2) }}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right">₱{{ number_format($totalAfterDiscount,2) }}</dd>
                        </dl>
                        @if ($payment >=  number_format($totalAfterDiscount,2))
                            <dl class="dlist-align">
                                <dt>Change:</dt>
                                <dd class="text-right">₱ {{ abs($change) }}</dd>
                            </dl>
                        @endif
                        <dl class="dlist-align pt-2">
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-times" wire:click.prevent="removeCoupon"> Remove Coupon</i></a>
                        </dl>

                    @else
                        <dl class="dlist-align">
                            <dt>Vat:</dt>
                            <dd class="text-right">₱{{ config('cart.tax')  }}%</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right  h5"><strong>₱{{ Cart::instance('pos')->total() }}</strong></dd>
                        </dl>
                        @if ($payment >= $total)
                            <dl class="dlist-align">
                                <dt>Change:</dt>
                                <dd class="text-right">₱ {{ abs($change) }}</dd>
                            </dl>

                        @endif
                       
                    @endif
                        <hr>
                        <p class="">
                            <a href="#" class="btn btn-danger" wire:click.prevent="deleteAll"> Clear  </a>
                        </p>
                        <dl class="dlist-align">
                            <dd class="text-right h5"><button type="submit" class="btn btn-block btn-success">Save</button></dd>
                        </dl>
                    </div> <!-- card-body.// -->
                </div>  <!-- card .// -->

                

                
                </div> <!-- col.// -->
                
                </div> <!-- container .//  -->
            
        </section>
    </div>
		</form>
</div>
	

   <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Transaction History</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
            <table class="table table-bordered" id="book_table1" style="width: 100%" wire:poll.5s.>
                <thead class="bg-light">
                    <tr>
                        <th>Transaction Code</th>
                        <th>Date and Time Transacted</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @if ($order->order_type == 'offline')
                            <tr>
                                <td>{{ $order->transaction->transaction_code }}</td>
                                <td>{{ date("d M Y h:i", strtotime($order->created_at)) }}</td>
                                <td>{{ $order->total}}</td>
                                <td>
                                    <a href="{{ route('cashier.transaction-details',['order_id' => $order->id]) }}" class="btn btn-primary btn-sm">Details</a>
                                </td>
                            
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <th colspan="4">{{ $orders->links() }}</th>
                </tfoot>
            </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
            </div>
        </div>
        </div>
    </div>
</div>