<div> 
    @if (Cart::instance('cart')->count() > 0)
        <!-- ========================= SECTION CONTENT ========================= -->
        <section class="section-content padding-y">
                <div class="container">
                    @if (Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>Success</strong> {{ Session::get('success_message') }}
                    </div>
                    @endif
                
            <div class="row">
            
            <main class="col-md-9">
            <div class="card border shadow">
                
                <table class="table table-borderless table-shopping-cart">
                <thead class="text-muted">
                    <tr class="small text-uppercase">
                        <th scope="col">Product</th>
                        <th scope="col" width="120">Quantity</th>
                        <th scope="col" width="120">Price</th>
                        <th scope="col" class="text-right" width="200"> </th>
                    </tr>
                </thead>
            
                    
                @if (Cart::instance('cart')->count() > 0)
                    
                    <tbody>
                        @foreach (Cart::instance('cart')->content() as $item)
                            <tr>
                                <td>
                                    <figure class="itemside">
                                        <div class="aside">
                                            <img src="{{ asset('img')}}/{{ $item->model->image }}" alt="{{ $item->model->name }}" class="img-sm border" />
                                        </div>
                                        <figcaption class="info">
                                            <a href="{{ route('product.details',['slug'=>$item->model->slug]) }}" class="title text-dark">{{ $item->model->name }}</a>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td> 
                                    <div class="input-group input-spinner">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light" type="button" id="button-minus" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"> <i class="fa fa-minus"></i> </button>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $item->qty }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button" id="button-plus" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"> <i class="fa fa-plus"></i> </button>  
                                        </div>
                                    </div>
                                </td>
                                <td> 
                                    <div class="price-wrap"> 
                                        <var class="price">₱{{ $item->model->regular_price }}</var> 
                                        <small class="text-muted"> ₱{{ $item->subtotal }} </small> 
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right"> 
                                <a href="" class="btn btn-danger" wire:click.prevent="deleteItem('{{ $item->rowId }}')"> Remove</a>
                                </td>
                            </tr>
                        @endforeach
                @else
                        <tr>
                            <td>
                                <p>No item in the cart yet</p>
                            </td>
                        </tr>
                        
                    </tbody>
                @endif
                </table>
            
                <div class="card-body border-top">
                    <a href="#" class="btn btn-success float-md-right" wire:click.prevent="routeCheckout"> Checkout <i class="fa fa-chevron-right"></i> </a>
                    
                    <a href="/shop" class="btn btn btn-outline-primary"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
                    <a href="#" class="btn btn-danger " wire:click.prevent="deleteAll"> Clear Cart  </a>
                </div>	
            </div> <!-- card.// -->
            
            </main> <!-- col.// -->
                <aside class="col-md-3">
                    <div class="card mb-3 border shadow">
                        <div class="checkout-info p-3">
                            <label for="" class="checkbox-field">
                                <input type="checkbox" name="have-code" id="have-code" class="frm-input" value="1" wire:model="haveCouponCode"><span> I have a coupon code</span>
                            </label>
                        </div>
                        @if (!session::has('coupon'))
                            @if ($haveCouponCode == 1)
                                <div class="card-body">
                                    <form wire:submit.prevent="applyCoupon">
                                        <div class="form-group">
                                            @if(Session::has('coupon_msg'))
                                            <div class="alert alert-danger" role="danger">
                                                {{Session::get('coupon_msg')}}
                                            </div>
                                            @endif
                                            <label>Have coupon? enter it here.</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="coupon-code" placeholder="Coupon code" wire:model="couponCode">
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
                    <div class="card border shadow">
                        <div class="card-body">
                            <dl class="dlist-align">
                                <dt>SubTotal:</dt>
                                <dd class="text-right">₱{{ Cart::instance('cart')->subtotal() }}</dd>
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
                                <dl class="dlist-align pt-2">
                                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-times" wire:click.prevent="removeCoupon"> Remove Coupon</i></a>
                                </dl>

                            @else
                                <dl class="dlist-align">
                                    <dt>Vat:</dt>
                                    <dd class="text-right">₱{{ Cart::instance('cart')->tax() }}</dd>
                                </dl>
                                <dl class="dlist-align">
                                    <dt>Total:</dt>
                                    <dd class="text-right  h5"><strong>₱{{ Cart::instance('cart')->total() }}</strong></dd>
                                </dl>
                            @endif
                            
                            <hr>
                        </div> <!-- card-body.// -->
                    </div>  <!-- card .// -->
                </aside> <!-- col.// -->
            </div>
            
            </div> <!-- container .//  -->
    @else
           
            <section class="section-pagetop bg">
                <div class="container mt-3 mb-2 text-center">
                    <h1 class="title-page">Your cart is empty!</h1>
                    <p class="lead">Add one to the cart now</p>
                    <a class="btn btn-success" href="/shop">Shop now</a>
                </div> <!-- container //  -->
            </section>
    @endif
    
    </section>

</div>