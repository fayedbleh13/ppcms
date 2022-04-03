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
        </style>

        @livewireStyles

        
    </head>
    <body class="font-sans antialiased bg-light">
        
        <!-- Page Heading -->
        <header class="header-main border-bottom shadow">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2 ml-5">
                    <ul class="navbar-nav mr-auto">
                        <a class="navbar-brand mx-auto" href="#"><img src="{{ asset('img/carrera_logo(no bg).png') }}" alt="" class="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> 
                    </ul>
                </div>
               
                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 mr-5">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <i class="fa fa-user rounded-circle mr-2"></i> Courier: {{ Auth::user()->name }} 
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>                           
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                          </div>
                        </li>
                      </ul>
                </div>
            </nav>
            {{-- <nav class="navbar navbar-main navbar-expand-lg navbar-light">
              <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="d-flex">
                            <div class="flex-fill">
                                <a class="navbar-brand" href="#"><img src="{{ asset('img/carrera_logo(no bg).png') }}" alt="" class="logo"></a>
                    
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                                  <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
    
                            <div class="flex-fill">
                               
                            </div>
                        </div>
                
                    </div>               
                </div>  <!-- widget-header .// -->
                
                        
                        </div> <!-- widgets-wrap.// -->
                    </div>
                </div> <!-- row.// -->
            
               
                </div>
              </div>
            </nav> --}}
        </header>
        
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

        
        
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/functions.js') }}" defer></script>
        {{-- <script src="{{ asset('js/chosen.jquery.min.js') }}" defer></script> --}}
        <script src="{{ asset('js/jquery.flexslider.js') }}" defer></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
        
        <!-- Toastr -->
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

        @stack('scripts')
       
        </script>

        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
        

        
    </body>
</html>
