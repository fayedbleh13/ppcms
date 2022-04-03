{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-light font-sans antialiased">
        {{ $slot }}
    </body>
</html> --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Carrera Motor shop and Services') }}</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/ui.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
        

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        </style>

        @livewireStyles

        
    </head>
    <body class="font-sans antialiased bg-light">
        
        <!-- Page Heading -->
        <header>
            <section class="header-main border-bottom">
                <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-4">
                    <a href="#" class="brand-wrap">
                        <img class="logo" src="{{ asset('img/carrera_logo(no bg).png') }}">
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-6 col-sm-12 pl-5">
                    <form action="#" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                              <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-5 col-xl-4 col-sm-8 col-md-4 col-7">
                  <div class="justify-content-end">
                      
                          @livewire('cart-count')
                          
                          <div class="widget-header dropdown">
                              @if (Route::has('login'))
                                  @auth
                                      @if (Auth::user()->user_type === "ADM")
                                      
                          
                                      
                                          <a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10" aria-expanded="false">
                                              <div class="icon"><i class="fa fa-lg fa-user-circle"></i></div>
                                              <div class="text"> 
                                                  <small class="text-muted">My Account</small> <br>
                                                  <span>Welcome {{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span>
                                              </div>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-122px, -338px, 0px); top: 0px; left: 0px; will-change: transform;">
                                              <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                              
                                              <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                  @csrf
                                              </form>
                                          </div> <!--  dropdown-menu .// -->
                                          
                                      
                                          
                                          
                                      @else
                                  
                                          <a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10" aria-expanded="false">
                                              <div class="icon"><i class="fa fa-lg fa-user-circle"></i></div>
                                              <div class="text"> 
                                                  <small class="text-muted">My Account</small> <br>
                                                  <span>Welcome {{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span>
                                              </div>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-122px, -338px, 0px); top: 0px; left: 0px; will-change: transform;">
                                              <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>
                                              <a class="dropdown-item" href="#">Wishlist</a>
                                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                          </div> <!--  dropdown-menu .// -->
                                          <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                              @csrf
                                          </form>
                      </div>         
                    
                                       @endif
                              @else
                                  <div class="widget-header dropdown sr">
                                      <a href="{{ route('login') }}" class="ml-3 icontext">
                                          <div class="icon"><i class="fa fa-lg fa-user-circle"></i></div>
                                          <div class="text"> 
                                              <small class="text-muted">Sign In / Join</small> <br>
                                              <span>My account</span>
                                          </div>
                                      </a>
                                          
                                  </div> <!--  dropdown-menu .// -->
                              @endif
                  </div>               
              </div>
                      @endif    
                                      
              </div>  <!-- widget-header .// -->
            
                    
                    </div> <!-- widgets-wrap.// -->
                </div>
            </div> <!-- row.// -->
                </div> <!-- container.// -->
            </section>
        </header>
        <!-- Second menu -->
        <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom shadow">
            <div class="container">
          
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          
              <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/shop">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/services">Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/about_us">About Us</a>
                  </li>
                </ul>
              </div> <!-- collapse .// -->
            </div> <!-- container .// -->
        </nav>
        <!-- Page Content -->
        <main class="container-fluid">
            {{ $slot }}
        </main>

        @stack('modals')

        <!-- Scripts -->
        
        <script src="{{ mix('js/app.js') }}" defer></script>
        @livewireScripts

        @stack('scripts')
        
    </body>
</html>
