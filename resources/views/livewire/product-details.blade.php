<div>
    <main id="main" class="main-site">

		<div class="container mt-5">

			<div class="row">

				<div class="card col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area shadow border">
					<div class="wrap-product-detail">
						<div class="detail-media">
							<div class="product-gallery">
							  <ul class="slides">

							    <li data-thumb="{{ asset('img/')}}/{{ $products->image }}">
							    	<img src="{{ asset('img/')}}/{{ $products->image }}" alt="{{ $products->name }}" />
							    </li>

							    

							  </ul>
							</div>
						</div>
						<div class="detail-info">
                            <h2 class="product-name">{{ $products->name }}</h2>
                            <div class="short-desc">
                                {{ $products->short_description }}
                            </div>
                            <div class="wrap-social">
                            	<a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
                            </div>
                            <div class="wrap-price"><span class="product-price">₱ {{ $products->regular_price }}</span></div>
                            <div class="stock-info in-stock">
                                <p class="availability">Availability: <b>{{ $products->stock_status }}</b></p>
                            </div>
                            <div class="quantity">
                            	<span>Stocks: <strong>{{ $products->quantity }}</strong></span>
							</div>
							<div class="wrap-butons">
								<a href="#" class="btn btn btn-outline-primary btn-lg shadow" wire:click.prevent="store({{ $products->id }}, '{{ $products->name }}', '{{ $products->regular_price }}' )">Add to Cart</a>
							</div>
						</div>
						<div class="advance-info mb-4">
							<div class="tab-control normal">
								<a href="#description" class="tab-control-item active">Description</a>
								<a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
							</div>
							<div class="tab-contents">
								<div class="tab-content-item active" id="description">
									{{ $products->description }}
								</div>
								<div class="tab-content-item " id="add_infomation">
									<table class="shop_attributes">
										<tbody>
											<tr>
												<th>SKU</th><td class="product_weight">{{ $products->SKU }}</td>
											</tr>
											<tr>
												<th>Category</th><td class="product_dimensions">{{ $products->cat->name }}</td>
											</tr>
											<tr>
												<th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">

					<div class="widget mercado-widget widget-product">
                        <div class="card card-header border shadow">
                            <h3 class="title-box">Popular Products</h3>
                        </div>
						
						<div class="widget-content card border shadow mt-3" style="padding: 2em; margin-bottom: 1em;">
							<ul class="products" >

                                @foreach ($popular_products as $popular)
                                
								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="{{ route('product.details',['slug'=>$popular->slug]) }}" title="{{ $popular->name }}">
												<figure><img src="{{ asset('img/')}}/{{ $popular->image }}" alt="{{ $popular->name }}"></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="{{ route('product.details',['slug'=>$popular->slug]) }}" title="{{ $popular->name }}" class="product-name"><span>{{ $popular->name }}</span></a>
											<div class="wrap-price"><span class="product-price">{{ $popular->regular_price }}</span></div>
										</div>
									</div>
								</li>
                                @endforeach

							</ul>
						</div>
					</div>

				</div><!--end sitebar-->

				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box border shadow mb-1">Related Products</h3>
						<div class="wrap-products card border shadow">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                                @foreach ($related_products as $related)

								<div class="product product-style-2 equal-elem ">
									<div class="product-thumnail">
										<a href="{{ route('product.details',['slug'=>$related->slug]) }}" title="{{ $related->name }}">
											<figure><img class="border" src="{{ asset('img/')}}/{{ $related->image }}" width="214" height="214" alt="{{ $related->name }}"></figure>
										</a>
										<div class="group-flash">
											<span class="flash-item new-label">new</span>
										</div>
										<div class="wrap-btn">
											<a href="#" class="function-link">quick view</a>
										</div>
									</div>
									<div class="product-info">
										<a href="{{ route('product.details',['slug'=>$related->slug]) }}" title="{{ $related->name }}" class="product-name"><span>{{ $related->name }}</span></a>
										<div class="wrap-price"><span class="product-price">{{ $related->regular_price }}</span></div>
									</div>
								</div>
                                @endforeach

							</div>
						</div><!--End wrap-products-->
					</div>
				</div>

			</div><!--end row-->

		</div><!--end container-->

	</main>
</div>
