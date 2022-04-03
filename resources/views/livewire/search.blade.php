<div>
    <section class="section-content padding-y">
        <div class="container">
        
        <div class="row">
            <aside class="col-md-3">
                
        <div class="card">
            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title font-weight-bold">Categories</h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_1" style="">
                    <div class="card-body">
                        <ul class="list-menu">

                        @foreach ($categories as $category )
                            <li><a href="{{ route('product.category', ['category_slug'=>$category->slug] )}}">{{ $category->name }}</a></li>
                        @endforeach
                    
                        </ul>
                    </div> <!-- card-body.// -->
                </div>
            </article> <!-- filter-group  .// -->
            {{-- <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title font-weight-bold">Brands </h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_2" style="">
                    <div class="card-body">
                        <label class="custom-control custom-checkbox">
                          <input type="checkbox" checked="" class="custom-control-input">
                          <div class="custom-control-label">Mercedes  
                              <b class="badge badge-pill badge-light float-right">120</b>  </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                          <input type="checkbox" checked="" class="custom-control-input">
                          <div class="custom-control-label">Toyota 
                              <b class="badge badge-pill badge-light float-right">15</b>  </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                          <input type="checkbox" checked="" class="custom-control-input">
                          <div class="custom-control-label">Mitsubishi 
                              <b class="badge badge-pill badge-light float-right">35</b> </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                          <input type="checkbox" checked="" class="custom-control-input">
                          <div class="custom-control-label">Nissan 
                              <b class="badge badge-pill badge-light float-right">89</b> </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input">
                          <div class="custom-control-label">Honda 
                              <b class="badge badge-pill badge-light float-right">30</b>  </div>
                        </label>
            </div> <!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title font-weight-bold">Price range </h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_3" style="">
                    <div class="card-body">
                        <input type="range" class="custom-range" min="0" max="100" name="">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Min</label>
                          <input class="form-control" placeholder="$0" type="number">
                        </div>
                        <div class="form-group text-right col-md-6">
                          <label>Max</label>
                          <input class="form-control" placeholder="$1,0000" type="number">
                        </div>
                        </div> <!-- form-row.// -->
                        <button class="btn btn-block btn-primary">Apply</button>
                    </div><!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class="">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title font-weight-bold">Sizes </h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_4" style="">
                    <div class="card-body">
                      <label class="checkbox-btn">
                        <input type="checkbox">
                        <span class="btn btn-light"> XS </span>
                      </label>
        
                      <label class="checkbox-btn">
                        <input type="checkbox">
                        <span class="btn btn-light"> SM </span>
                      </label>
        
                      <label class="checkbox-btn">
                        <input type="checkbox">
                        <span class="btn btn-light"> LG </span>
                      </label>
        
                      <label class="checkbox-btn">
                        <input type="checkbox">
                        <span class="btn btn-light"> XXL </span>
                      </label>
                </div><!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" class="">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title font-weight-bold">More filter </h6>
                    </a>
                </header>
                <div class="filter-content collapse in" id="collapse_5" style="">
                    <div class="card-body">
                        <label class="custom-control custom-radio">
                          <input type="radio" name="myfilter_radio" checked="" class="custom-control-input">
                          <div class="custom-control-label">Any condition</div>
                        </label>
        
                        <label class="custom-control custom-radio">
                          <input type="radio" name="myfilter_radio" class="custom-control-input">
                          <div class="custom-control-label">Brand new </div>
                        </label>
        
                        <label class="custom-control custom-radio">
                          <input type="radio" name="myfilter_radio" class="custom-control-input">
                          <div class="custom-control-label">Used items</div>
                        </label>
        
                        <label class="custom-control custom-radio">
                          <input type="radio" name="myfilter_radio" class="custom-control-input">
                          <div class="custom-control-label">Very old</div>
                        </label>
                    </div><!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
        </div> <!-- card.// -->
         --}}
            </aside> <!-- col.// -->
            <main class="col-md-9">
        
        <header class="border-bottom mb-4 pb-3">
                <div class="form-inline">
                    <span class="mr-md mr-5 font-weight-bold">Motorcycle Parts </span>
                    <span class="ml-md-auto mr-4">32 Items found </span>
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
        @if($products->count() > 0)
            
        <div class="row">

            @foreach ($products as $product )
                @if($product->stock_status)
                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap"> 
                                <img src="{{ asset('img/')}}/{{ $product->image }}" alt="{{ $product->name }}">
                                <a class="btn-overlay" href="{{ route('product.details',['slug'=>$product->slug]) }}"><i class="fa fa-search-plus"></i> Quick view</a>
                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="{{ route('product.details',['slug'=>$product->slug]) }}" class="title">{{ $product->name }}</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">{{ $product->regular_price }}</span>
                                    </div> <!-- price-wrap.// -->
                                </div>
                                <a href="#" class="btn btn-block btn-primary" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', '{{ $product->regular_price }}' )">Add to cart </a>
                            </figcaption>
                        </figure>   
                    </div> <!-- col.// -->
                @endif
            @endforeach
 
        </div> <!-- row end.// -->
        @else 
            <p class="pt-3">No Products Found</p>
        @endif
        <nav class="mt-4" aria-label="Page navigation sample">
            {{ $products->links() }}
          {{-- <ul class="pagination">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul> --}}
        </nav>
        
            </main> <!-- col.// -->
        
        </div>
        
        </div> <!-- container .//  -->
        </section>
</div>
