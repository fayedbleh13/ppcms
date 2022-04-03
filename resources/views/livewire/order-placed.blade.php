<div>
    <main id="main" class="main-site mt-5 mb-5">
{{-- 
		{{-- <div class="container pb-60">
			<div class="row">
				<div class="col-md-12 text-center">
					

                    <div class="page-content container">

                        <div class="container px-0">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-10 offset-lg-1">
                                    <div class="card border shadow">
                                        <div class="card-header">
                                            <h2 class="font-weight-bold mt-3">Thank you for your order. Here is your order summary</h2>
                                        </div>
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div>
                                                        <span class="text-sm text-grey-m2">To:</span>
                                                        <span class="text-600 text-110 text-blue">{{ $order->firstname }}, {{ $order->lastname }}</span>
                                                    </div>
                                                    <div class="text-grey-m2">
                                                        <div class="my-1">
                                                            {{ $order->line1 }}, {{ $order->city }}
                                                        </div>
                                                        <div class="my-1">
                                                            {{ $order->province }}, Philippines
                                                        </div>
                                                        <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">{{ $order->mobile }}</b></div>
                                                    </div>
                                                </div>
                                                <!-- /.col -->

                                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                    <hr class="d-sm-none" />
                                                    <div class="text-grey-m2">
                                                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                            Order Invoice
                                                        </div>

                                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{ $order->order_code }}</div>

                                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{ $order->created_at }}</div>

                                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">{{ $order->transaction->trans_status }}</span></div>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>

                                            <div class="mt-4">
                                                <div class="row text-600 text-white bgc-default-tp1 py-25">
                                                    <div class="d-none d-sm-block col-1">#</div>
                                                    <div class="col-9 col-sm-5">Description</div>
                                                    <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                                                    <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                                                    <div class="col-2">Amount</div>
                                                </div>
                                                @foreach ($order->orderItem as $item)
                                                    
                                                
                                                <div class="text-95 text-secondary-d3">
                                                    <div class="row mb-2 mb-sm-0 py-25">
                                                        <div class="col-9 col-sm-5">{{ $item->product->name }}</div>
                                                        <div class="d-none d-sm-block col-2">{{ $item->quantity }}</div>
                                                        <div class="d-none d-sm-block col-2 text-95">{{ $item->price }}</div>
                                                        <div class="col-2 text-secondary-d2">{{ $item->order->subtotal }}</div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="row border-2 brc-default-l2"></div>

                                                <!-- or use a table instead -->

                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                                        Extra note such as company or payment information...
                                                    </div>

                                                    <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                                        <div class="row my-2">
                                                            <div class="col-7 text-right">
                                                                SubTotal
                                                            </div>
                                                            <div class="col-5">
                                                                <span class="text-120 text-secondary-d1">{{ $order->subtotal }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-7 text-right">
                                                                Tax (12%)
                                                            </div>
                                                            <div class="col-5">
                                                                <span class="text-110 text-secondary-d1">{{$order->tax}}</span>
                                                            </div>
                                                        </div>

                                                        <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                            <div class="col-7 text-right">
                                                                Total Amount
                                                            </div>
                                                            <div class="col-5">
                                                                <span class="text-150 text-success-d3 opacity-2">{{ $order->total }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr />

                                                <div>
                                                    <a href="/shop" class="btn btn-lg btn-primary">Continue Shopping</a>
                                                </div>
                                            </div>
                                        </div>
                                  
                                    {{-- <hr class="row brc-default-l1 mx-n1 mb-4" /> --}}
                                    </div>   
                                </div>  
                            </div>
                        </div>
                    </div>
                    
				</div>
			</div>
		{{-- </div><!--end container--> --}} 

        
		<div class="container pb-60">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2>Thank you for your order</h2>
                   
                    <p>A confirmation email was sent.</p>
                    <a href="/shop" class="btn btn-primary">Continue Shopping</a>
				</div>
			</div>
		</div><!--end container-->

	</main>
    <!-- ========================= FOOTER ========================= -->
</div>
