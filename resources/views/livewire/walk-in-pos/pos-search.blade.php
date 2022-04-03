<div class="container-fluid mt-4 mb-4">  
    <form wire:submit.prevent="wamiKabaloSaName">
			@if(Session::has('pro'))
					<div class="alert alert-success" role="alert">
							{{Session::get('pro')}}
					</div>
				@endif
        <div class="row">
        <header class=" mt-3 mb-3 pb-3">
            <div class="form-inline">
                <span class="mr-md mr-5 font-weight-bold">Motorcycle Parts </span>
                <span class="ml-md-auto mr-4">21 Items found </span>
                <div>
                    <select class="mr-2 form-control" wire:model="sorting">
                        <option value="default">Default</option>
                        <option value="latest">Latest items</option>
                        <option value="price_asc">Price Low to High</option>
                        <option value="price_desc">Price High to Low</option>
                    </select>
                </div>
            </div>
        </header><!-- sect-heading -->
        
        <section class="section-content col-md-9">
					<div class="container border">
						<div class="card card-body">
							<div class="row">
								@foreach ($products as $product )
									@if($product->stock_status)
										<div class="col-md-3">
											<figure class="itemside mb-4">
												<div class="aside"><img class="border img-sm" src="{{ asset('img/')}}/{{ $product->image }}" alt="{{ $product->name }}"></div>
												<figcaption class="info align-self-center">
													<a href="{{ route('product.details',['slug'=>$product->slug]) }}" class="title">{{ $product->name }}</a>
													<a href="#" class="btn btn-primary btn-sm" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', '{{ $product->regular_price }}' )">Select </a>
												</figcaption>
											</figure>
										</div> <!-- col.// -->
									@endif
								@endforeach
							</div> <!-- row.// -->
						</div>
					</div>
        </section>
        <section class="section-content col-md-3">
                <div class="card border overflow-auto" style="height: 3in">
                    <table class="table table-borderless table-shopping-cart">
											<thead class="text-muted">
												<tr class="small text-uppercase">
													<th scope="col">Product</th>
													<th scope="col" width="120">Quantity</th>
													<th scope="col" width="120">Price</th>
												</tr>
											</thead>
											<tbody>
												@foreach (Cart::instance('pos')->content() as $item)
													<tr>
														<td>
															<h6 style="font-weight: bolder">{{ $item->model->name }}</h6>
														</td>
														<td> 
															<h6 style="font-weight: bolder">{{ $item->qty }}</h6>
														</td>
															<td> 
																<div class="price-wrap"> 
																	<var class="price">₱{{ $item->priceTotal() }}</var> 
																</div> <!-- price-wrap .// -->
															</td>
														</tr>
													<tr>
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
                
                <div class="card border mt-3">
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

                <div class="card border mt-3">
									<div class="card-body">
										<div class="form-group">
											<label for="paymentInput">Name:</label>
											<input type="text" class="form-control" placeholder="Name"  wire:model="name">
										</div>
										<div class="form-group">
											<label for="paymentInput">Payment:</label>
											<input type="text" class="form-control" id="paymentInput" placeholder="Payment" wire:model="payment">
										</div>
									</div>
                </div>

                <div class="card border mt-3">
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
                        <dl class="dlist-align">
                            <dt>Change:</dt>
                            <dd class="text-right">₱{{ $change }}</dd>
                        </dl>
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
                        <dl class="dlist-align">
                            <dt>Change:</dt>
                            <dd class="text-right">₱ {{ abs($change) }}</dd>
                        </dl>
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
	<!-- ========================= FOOTER ========================= -->
	<footer class="section-footer border-top py-3">
		<div class="container">
			<p class="float-md-right"> 
				© Copyright 2021 All rights reserved
			</p>
			<p>
				<a href="#">Terms and conditions</a>
			</p>
		</div><!-- //container -->
	</footer>
</div>