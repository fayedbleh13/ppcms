<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Point Of Sale</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet" type="text/css"/>
       
        <link href="{{ asset('css/ui.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
		@livewireStyles
</head>
<body class="hold-transition layout-top-nav">
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
                        <i class="fa fa-user rounded-circle mr-2"></i> Cashier: {{ Auth::user()->name }} 
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
    
    <div class="container-fluid">
		<div class="content">
			<div class="container-fluid">
				{{ $slot }}
			</div>
		</div>
    </div>
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

	<!-- Scripts -->
	<!-- jQuery -->
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- ChartJS -->
	<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
	<!-- Sparkline -->
	<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
	<!-- JQVMap -->
	<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
	<!-- jQuery Knob Chart -->
	<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
	<!-- daterangepicker -->
	<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
	<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
	<!-- Summernote -->
	<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
	<!-- overlayScrollbars -->
	<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('dist/js/adminlte.js') }}"></script>
	<!-- DataTables  & Plugins -->
	<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
	<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
	<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('dist/js/demo.js') }}"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
	@livewireScripts

    
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>
</html>