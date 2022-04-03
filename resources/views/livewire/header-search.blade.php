<div class="col-lg-6 col-sm-12 pl-5">
    <form action="{{ route('product.search') }}" name="form-search" >
        <div class="input-group w-100">
            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search">
            <div class="input-group-append">
              <button class="btn btn-primary" name="form-search" type="submit" wire:model="search">
                <i class="fa fa-search"></i>
              </button>
            </div>
        </div>
    </form> <!-- search-wrap .end// -->
</div> <!-- col.// -->