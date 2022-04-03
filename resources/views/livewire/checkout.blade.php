<main id="main" class="main-site">
    
    <div class="container-fluid mt-4">
        <form wire:submit.prevent="placeOrder">
          <div class="row">
                <main class="col-md-8">
                    <article class="card mb-4 border shadow">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Review cart</h4>
                            <div class="row">
                                @foreach (Cart::instance('cart')->content() as $product)
                                    
                                    <div class="col-md-6">
                                        <figure class="itemside  mb-4">
                                            <div class="aside"><img src="{{ asset('img')}}/{{ $product->model->image }}" class="border img-sm"></div>
                                            <figcaption class="info">
                                                <p>{{ $product->name }}</p>
                                                <span class="text-muted">{{ $product->qty }}x = P{{ $product->priceTotal }} </span>
                                            </figcaption>
                                        </figure>
                                    </div> <!-- col.// -->
                                   
                                @endforeach
                            </div> <!-- row.// -->
                        </div> <!-- card-body.// -->
                    </article> <!-- card.// --> 
                    <article class="card mb-5 border shadow">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Billing Address</h4>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="firstname">First name</label>
                                        <input id="firstname" type="text" placeholder="Type here" name="firstname" class="form-control" wire:model="firstname">
                                        @error('firstname') <span class="alert-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Last name</label>
                                        <input type="text" placeholder="Type here" class="form-control" wire:model="lastname">
                                        @error('lastname') <span class="alert-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Phone number</label>
                                        <input type="text" value="+998" class="form-control" wire:model="mobile">
                                        @error('mobile') <span class="alert-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Email</label>
                                        <input type="email" placeholder="example@gmail.com" class="form-control" wire:model="email">
                                        @error('email') <span class="alert-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Address</label>
                                        <input type="text" placeholder="ex. Brgy.Buruun, timoga" class="form-control" wire:model="line1">
                                        @error('address') <span class="alert-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>City/Town</label>
                                        <input type="text" placeholder="ex. Iligan City" class="form-control" wire:model="city">
                                        @error('city') <span class="alert-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Province</label>
                                        <input type="text" placeholder="ex. Lanao del Norte" class="form-control" wire:model="province">
                                        @error('province') <span class="alert-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Zip code</label>
                                        <input type="text" placeholder="ex. 9200" class="form-control" wire:model="zipcode">
                                        @error('zipcode') <span class="alert-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-sm-6 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" wire:model="ship_diff_address">
                                            <label class="form-check-label" for="defaultCheck1">
                                            Ship to a different address?
                                            </label>
                                        </div>
                                    </div>    
                                </div> <!-- row.// -->	
                        </div> <!-- card-body.// -->
                    </article>
                    @if ($ship_diff_address)
                        <article class="card mb-5">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Shipping Address</h4>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Frst name</label>
                                            <input type="text" placeholder="Type here" class="form-control" wire:model="ship_firstname">
                                            <span class="text-danger">@error('ship_firstname')
                                              {{ $message }}
                                            @enderror</span>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Last name</label>
                                            <input type="text" placeholder="Type here" class="form-control" wire:model="ship_lastname">
                                            @error('ship_lastname') <span class="alert-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Phone number</label>
                                            <input type="text" value="+998" class="form-control" wire:model="ship_mobile">
                                            @error('ship_mobile') <span class="alert-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Email</label>
                                            <input type="email" placeholder="example@gmail.com" class="form-control" wire:model="ship_email">
                                            @error('ship_email') <span class="alert-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Address</label>
                                            <input type="text" placeholder="House/Unit/Flr #, Bldg Name, Blk or Lot #" class="form-control" wire:model="ship_address">
                                            @error('ship_address') <span class="alert-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Town/City</label>
                                            <input type="text" placeholder="Iligan City" class="form-control" wire:model="ship_city">
                                            @error('ship_city') <span class="alert-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Province</label>
                                            <input type="text" placeholder="Lanao del Norte" class="form-control" wire:model="ship_province">
                                            @error('ship_province') <span class="alert-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Zip code</label>
                                            <input type="text" placeholder="9200" class="form-control" wire:model="ship_zipcode">
                                            @error('ship_zipcode') <span class="alert-danger">{{ $message }}</span> @enderror
                                        </div>
                                       
                                    </div> <!-- row.// -->	
                            </div> <!-- card-body.// -->
                        </article>
                    @endif  
                </main>
                <aside class="col-md-4 mb-5">
                    <div class="card border shadow">
                        @error('paymentmode') <span class="alert-danger">{{ $message }}</span> @enderror
                        <h4 class="card-title ml-3 mt-3">Payment Method</h4>
                        <article class="accordion" id="accordion_pay">
                            <div class="card">
                                <header class="card-header">
                                    
                                    <img src="{{ URL::to('/') }}/images/cash-on-delivery.png" class="float-right" height="24" width="35"> 
                                    <label class="form-check collapsed" data-toggle="collapse" data-target="#pay_paynet">
                                        <input class="form-check-input" name="payment-option" checked="" type="radio" value="cod" wire:model="paymentmode">
                                        <h6 class="form-check-label"> 
                                            Cash on Delivery
                                        </h6>
                                    </label>
                                </header>
                                <div id="pay_paynet" class="collapse" data-parent="#accordion_pay" wire:ignore.self>
                                <div class="card-body">
                                    <p class="text-center text-muted">Pay when your order arrives with Cash on Delivery.</p>
                                </div> <!-- card body .// -->
                                </div> <!-- collapse .// -->
                            </div> <!-- card.// -->
                            <div class="card">
                            <header class="card-header">
                                <i class="fab fa-cc-mastercard float-right"></i>  
                                <label class="form-check" data-toggle="collapse" data-target="#pay_payme">
                                    <input class="form-check-input" name="payment-option" type="radio" value="card" wire:model="paymentmode">
                                    <h6 class="form-check-label"> Credit Card/Debit Card  </h6>
                                </label>
                            </header>
                                <div id="pay_payme" class="collapse" data-parent="#accordion_pay" wire:ignore.self>
                                    <div class="card-body">
                                        @if ($paymentmode == 'card')
                                            
                                            <p class="alert alert-success">Some information or instruction</p>
                                            <div class="container-fluid">
                                                @if (Session::has('stripe_error'))
                                                    <div class="alert alert-danger" roie="alert">{{ Session::get('stripe_error') }}</div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="card_no">Card Number:</label>
                                                            <input type="text" class="form-control col" placeholder="XXXX-XXXX-XXXX-XXXX" name="" wire:model="card_no">
                                                            <small id="emailHelp" class="form-text text-muted">We'll never share your card number with anyone else.</small>
                                                            @error('card_no') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc">Expiry Month</label>
                                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="MM" name="" wire:model="exp_month">
                                                            @error('exp_month') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc">Expiry Year</label>
                                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="YYYY" name="" wire:model="exp_year">
                                                            @error('exp_year') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="cvc">CVC</label>
                                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="CVC" name="" wire:model="cvc">
                                                            @error('cvc') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div> <!-- card body .// -->
                                </div> <!-- collapse .// -->
                            </div> <!-- card.// -->
                        </article> 
                        <!-- accordion end.// -->
                        <div class="card-body">
                            <h4 class="card-title mb-4">Delivery info</h4>
                            <form action="">
                                
                                    <div class="form-group col-mb-6">
                                        <label class="js-check box active">
                                            <input type="radio" name="dostavka" value="option1" checked="">
                                            <h6 class="title">Delivery</h6>
                                            <p class="text-muted">We will deliver by DHL Kargo</p>
                                        </label> <!-- js-check.// -->
                                    </div>
                                
                            <h4 class="mb-3">Overview</h4>
                            <dl class="dlist-align">
                                <dt class="text-muted">Delivery Type:</dt>
                                <dd>Delivery</dd>
                            </dl>
                            <dl class="dlist-align">
                            <dt class="text-muted">Payment method:</dt>
                            <dd>Cash</dd>
                            </dl>
                            <hr>
                            @if (Session::has('checkout'))
                                <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="h5">{{ Session::get('checkout')['total'] }}</dd>
                                </dl>
                            @endif
                            <hr>
                            <p class="small mb-3 text-muted">By clicking you are agree with our terms of conditions </p>
                            <button type="submit" href="#" class="btn btn-primary btn-block"> Place Order  </button>
                            
                        </div> <!-- card-body.// -->
                    </div> <!-- card.// -->
                </aside>
          </div>
        </form>
    </div><!--end container-->
    
</main>
