<main role="main">


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img style="max-width: 100%; height: auto;" src="../storage/headline_0.png" class="bd-placeholder-img"  xmlns="https://www.pngegg.com/en/png-zlqzd" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text>

       
    </div>
    <div class="carousel-item">
        <img style="max-width: 100%; height: auto;" src="../storage/headline_1.jpg" class="bd-placeholder-img"  xmlns="https://www.pngegg.com/en/png-zlqzd" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text>

        <div class="container">
        <div class="carousel-caption">
            <h1>Create a new Account now</h1>
            <p>An account provides a full-fledged access to the website</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('register') }}">Sign up here</a></p>
        </div>
        </div>
    </div>
    <div class="carousel-item">
        <img style="max-width: 100%; height: auto;" src="../storage/headline_3.png" class="bd-placeholder-img"  xmlns="https://www.pngegg.com/en/png-zlqzd" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text>

        <div class="container">
        <div class="carousel-caption text-left">
            <p><a class="btn btn-lg btn-primary" href="/shop">Shop now</a></p>
        </div>
        </div>
    </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<section class="section-specials padding-y border-bottom home-space">
    <div class="container">	
    <div class="row">
    <div class="col-md-4">	
                <figure class="itemside" >
                    <div class="aside">
                        <span class="icon-sm rounded-circle bg-primary">
                            <i class="fa fa-money-bill-alt white"></i>
                        </span>
                    </div>
                    <figcaption class="info">
                        <h6 class="title">Reasonable prices</h6>
                        <p class="text-muted">
                            We assure you all our products are at a fair and affordable price
                        </p>
                    </figcaption>
                </figure> <!-- iconbox // -->
        </div><!-- col // -->
        <div class="col-md-4">
                <figure class="itemside">
                    <div class="aside">
                        <span class="icon-sm rounded-circle bg-danger">
                            <i class="fas fa-thumbs-up white"></i>
                        </span>
                    </div>
                    <figcaption class="info">
                        <h6 class="title">Top Quality </h6>
                        <p class="text-muted">
                            Quality over quantity. we assure you our products are at the top of the line, providing you the best quality
                        </p>
                    </figcaption>
                </figure> <!-- iconbox // -->
        </div><!-- col // -->
        <div class="col-md-4">
                <figure class="itemside">
                    <div class="aside">
                        <span class="icon-sm rounded-circle bg-success">
                            <i class="fa fa-truck white"></i>
                        </span>
                    </div>
                    <figcaption class="info">
                        <h6 class="title">Quick delivery</h6>
                        <p class="text-muted">
                           We assure you our delivery will come on time and will always provide the best delivery service possible.
                        </p>
                    </figcaption>
                </figure> <!-- iconbox // -->
        </div><!-- col // -->
    </div> <!-- row.// -->
    
    </div> <!-- container.// -->
    </section>

<section class="section-name  padding-y-sm">
    <div class="container">
    
    <header class="section-heading">
        <a href="/shop" class="btn btn-outline-primary float-right">See all</a>
        <h3 class="section-title font-weight-bold">Popular products</h3>
    </header><!-- sect-heading -->
    
        
    <div class="row">
        @foreach ($products as $product)
            @if ($product->featured == 1)
                <div class="col-md-3">
                    <div href="{{ route('product.details',['slug'=>$product->slug]) }}" class="card card-product-grid border border-primary">
                        <a href="{{ route('product.details',['slug'=>$product->slug]) }}" class="img-wrap"> <img  src="{{ asset('img/')}}/{{ $product->image }}" alt="{{ $product->name }}"> </a>
                        <figcaption class="info-wrap">
                            <a href="{{ route('product.details',['slug'=>$product->slug]) }}" class="title">{{ $product->name }}</a>
                            <div class="price mt-1">₱ {{ $product->regular_price }}</div> <!-- price-wrap.// -->
                        </figcaption>
                    </div>
                </div> <!-- col.// -->
            @endif
        @endforeach
        
        
    </div> <!-- row.// -->
    
    </div><!-- container // -->
    </section>

<!-- FOOTER -->
<footer class="section-footer border-top">
    <div class="container">
        {{-- <section class="footer-top padding-y">
            <div class="row">
                <aside class="col-md col-6">
                    <h6 class="title">Brands</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#">Adidas</a></li>
                        <li> <a href="#">Puma</a></li>
                        <li> <a href="#">Reebok</a></li>
                        <li> <a href="#">Nike</a></li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title">Company</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#">About us</a></li>
                        <li> <a href="#">Career</a></li>
                        <li> <a href="#">Find a store</a></li>
                        <li> <a href="#">Rules and terms</a></li>
                        <li> <a href="#">Sitemap</a></li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title">Help</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#">Contact us</a></li>
                        <li> <a href="#">Money refund</a></li>
                        <li> <a href="#">Order status</a></li>
                        <li> <a href="#">Shipping info</a></li>
                        <li> <a href="#">Open dispute</a></li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title">Account</h6>
                    <ul class="list-unstyled">
                        <li> <a href="#"> User Login </a></li>
                        <li> <a href="#"> User register </a></li>
                        <li> <a href="#"> Account Setting </a></li>
                        <li> <a href="#"> My Orders </a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Social</h6>
                    <ul class="list-unstyled">
                        <li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
                        <li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
                        <li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
                        <li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
                    </ul>
                </aside>
            </div> <!-- row.// -->
        </section>	<!-- footer-top.// --> --}}

    </div><!-- //container -->
</footer>
</main>

