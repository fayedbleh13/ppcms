<a href="/cart" class="widget-header mr-3">
    <div class="icon">
        <i class="icon-sm rounded-circle border fa fa-shopping-cart"></i>
        @if (Cart::instance('cart')->count() > 0)

        <span class="notify">{{ Cart::instance('cart')->count() }}</span>

        @endif
    </div>
</a>