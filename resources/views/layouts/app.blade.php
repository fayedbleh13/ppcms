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
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet" type="text/css"/>
       
        <link rel="stylesheet" href="sweetalert2.min.css">

        <link href="{{ asset('css/ui.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/contact.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
        
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
        body{
            margin-top:20px;
            color: #484b51;
        }
        .text-secondary-d1 {
            color: #728299!important;
        }
        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }
        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }
        .brc-default-l1 {
            border-color: #dce9f0!important;
        }

        .ml-n1, .mx-n1 {
            margin-left: -.25rem!important;
        }
        .mr-n1, .mx-n1 {
            margin-right: -.25rem!important;
        }
        .mb-4, .my-4 {
            margin-bottom: 1.5rem!important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0,0,0,.1);
        }

        .text-grey-m2 {
            color: #888a8d!important;
        }

        .text-success-m2 {
            color: #86bd68!important;
        }

        .font-bolder, .text-600 {
            font-weight: 600!important;
        }

        .text-110 {
            font-size: 110%!important;
        }
        .text-blue {
            color: #478fcc!important;
        }
        .pb-25, .py-25 {
            padding-bottom: .75rem!important;
        }

        .pt-25, .py-25 {
            padding-top: .75rem!important;
        }
        .bgc-default-tp1 {
            background-color: rgba(121,169,197,.92)!important;
        }
        .bgc-default-l4, .bgc-h-default-l4:hover {
            background-color: #f3f8fa!important;
        }
        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }
        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120%!important;
        }
        .text-primary-m1 {
            color: #4087d4!important;
        }

        .text-danger-m1 {
            color: #dd4949!important;
        }
        .text-blue-m2 {
            color: #68a3d5!important;
        }
        .text-150 {
            font-size: 150%!important;
        }
        .text-60 {
            font-size: 60%!important;
        }
        .text-grey-m1 {
            color: #7b7d81!important;
        }
        .align-bottom {
            vertical-align: bottom!important;
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
                    <a href="/" class="brand-wrap">
                        <img class="logo" src="{{ asset('img/carrera_logo(no bg).png') }}">
                    </a> <!-- brand-wrap.// -->
                </div>
                
                @livewire('header-search')

                <div class="col-lg-5 col-xl-4 col-sm-8 col-md-4 col-7">
                    <div class="justify-content-end">
                        
                            @livewire('cart-count')
                            
                            <div class="widget-header dropdown">
                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->user_type === "ADM")
                                        
                            
                                        
                                            <a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10" aria-expanded="false">
                                                <div class="icon icon-md"><i class="fa fa-lg fa-user-circle"></i></div>
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
                                                @if (Auth::user()->profile_photo_path)
                                                <div class="icon icon-md "> <img width="48" src="{{ asset('assets/images/profile/') }}/{{ Auth::user()->profile_photo_path }}" class="rounded-circle" style="height: 1.7em;"></div>
                                                @else
                                                <div class="icon icon-md"><i class="fa fa-lg fa-user-circle"></i></div>
                                                @endif
                                                
                                                <div class="text"> 
                                                    <small class="text-muted">My Account</small> <br>
                                                    <span> <span>Welcome {{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span>
                                                </div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; transform: translate3d(-122px, -338px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                @livewire('user.user-redirect')
                                                
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
                                            <div class="icon icon-md"><i class="fa fa-lg fa-user-circle"></i></div>
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

         <!-- ========================= FOOTER ========================= -->
         <footer class="section-footer border-top py-3">
            <div class="container">
                <p class="float-md-right"> 
                    All rights reserved. <a href="#">Carrera Motor Shop and Services</a>.</strong>
                </p>
                <p>
                    <strong>Copyright &copy; 2021 
                    
                </p>
            </div><!-- //container -->
        </footer>	

        @stack('modals')

        <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/functions.js') }}" defer></script>
        {{-- <script src="{{ asset('js/chosen.jquery.min.js') }}" defer></script> --}}
        <script src="{{ asset('js/jquery.flexslider.js') }}" defer></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
       
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script>
                //cancelbooking
            window.addEventListener('openCancelBookModal', function(){
            $('.cancelBookModal').find('span').html('');
            $('.cancelBookModal').find('form')[0].reset();
            $('.cancelBookModal').modal('show');
            });

            window.addEventListener('closeCancelBookModal', function(){
            $('.cancelBookModal').find('span').html('');
            $('.cancelBookModal').find('form')[0].reset();
            $('.cancelBookModal').modal('hide');
            });
        </script>
        @livewireScripts

         <!-- SweetAlert2 -->
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />

        @stack('scripts')
        
        
    </body>
</html>
