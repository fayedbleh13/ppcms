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
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
        <style>
            .nav-tabs li a {font-size:18px;}
            .btn-cust {
                font-size: 16px;
            }
        </style>

        @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
      <!--<div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>-->
    
      <!-- Navbar -->
      {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <!--<li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>-->
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
    
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav> --}}
      <!-- /.navbar -->
    
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Carrera Motor Shop</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link {{ 'admin/dashboard' == request()->path() ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/user-list" class="nav-link {{ 'admin/user-list' == request()->path() ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Customer list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/product-list" class="nav-link {{ 'admin/product-list' == request()->path() ? 'active' : '' }}">
                  <i class="nav-icon fas fa-shopping-bag"></i>
                  <p>Product</p>
                </a>
                {{--<ul class="nav nav-treeview">
                  <li class="nav-item {{ 'add-category' == request()->path() ? 'active' : '' }}">
                    <a href="/admin/add-product" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Product</p>
                    </a>
                  </li>
                  <li class="nav-item {{ 'add-category' == request()->path() ? 'active' : '' }}">
                    <a href="/admin/product-list" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Product List</p>
                    </a>
                  </li>
                </ul>--}}
              </li>
              <li class="nav-item">
                <a href="/admin/category-list" class="nav-link {{ 'admin/category-list' == request()->path() || 'admin/add-category' == request()->path() ? 'active' : '' }}">
                  <i class="nav-icon fas fa-sitemap"></i>
                  <p>
                    Category
                    <!--<i class="right fas fa-angle-left"></i>-->
                  </p>
                </a>
                {{--<ul class="nav nav-treeview">
                  <li class="nav-item {{ 'add-category' == request()->path() ? 'active' : '' }}">
                    <a href="/admin/add-category" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Category</p>
                    </a>
                  </li>
                  <li class="nav-item {{ 'add-category' == request()->path() ? 'active' : '' }}">
                    <a href="/admin/category-list" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Category List</p>
                    </a>
                  </li>
                </ul>--}}
              </li>
              <li class="nav-item">
                <a href="/admin/coupon-list" class="nav-link {{ 'admin/coupon-list' == request()->path() ? 'active' : '' }}">
                  <i class="nav-icon fas fa-ticket-alt"></i>
                  <p>
                    Coupon
                    <!--<i class="right fas fa-angle-left"></i>-->
                  </p>
                </a>
                <!--<ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/add-coupon" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Coupon</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/coupon-list" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Coupon List</p>
                    </a>
                  </li>
                </ul>-->
              </li>
              <li class="nav-item">
                <a href="/admin/orders-list" class="nav-link {{ 'admin/orders-list' == request()->path() ? 'active' : '' }}">
                    <i class="nav-icon fas fa-dolly"></i>
                  <p>Orders</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="/admin/services-list" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                  <p>Services</p>
                </a>
                {{--<ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/add-services" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Services</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/services-list" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Services List</p>
                    </a>
                  </li>
                </ul>--}}
              </li>
              <li class="nav-item">
                <a href="/admin/booking-list" class="nav-link {{ 'admin/booking-list' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-book-open nav-icon"></i>
                    <p>Appointments</p>
                </a>
              </li>
              <li class="nav-item {{ Request::is('admin/employee-list') || Request::is('admin/attendances') || Request::is('admin/deductions') 
              || Request::is('admin/allowances') || Request::is('admin/leave-list') || Request::is('admin/payslips') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::is('admin/employee-list') || Request::is('admin/attendances') || Request::is('admin/deductions') 
                || Request::is('admin/allowances') || Request::is('admin/leave-list') || Request::is('admin/payslips') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-money-check-alt"></i>
                  <p>
                    Payroll
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/employee-list" class="nav-link {{ 'admin/employee-list' == request()->path() ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Employee List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/deductions" class="nav-link {{ 'admin/deductions' == request()->path() ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Deductions</p>
                    </a>
                  </li>
                  {{-- <li class="nav-item">
                    <a href="/admin/allowances" class="nav-link {{ 'admin/allowances' == request()->path() ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Allowances</p>
                    </a>
                  </li> --}}
                  <li class="nav-item">
                    <a href="/admin/leave-list" class="nav-link {{ 'admin/leave-list' == request()->path() ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Leave</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/payslips" class="nav-link {{ 'admin/payslips' == request()->path() ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Payslips</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                  <a href="/admin/inventory" class="nav-link {{ 'admin/inventory' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-boxes nav-icon"></i>
                    <p>Inventory</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/admin/sales" class="nav-link {{ 'admin/sales' == request()->path() ? 'active' : '' }}">
                    <i class="fas fa-dollar-sign nav-icon"></i>
                  <p>Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
              </li>
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      <main class="container-fluid mt-5 mb-5">
      {{$slot}}
      </main>

      <!-- /.content-wrapper -->
      <footer class="main-footer fixed-bottom">
        <strong>Copyright &copy; 2021 
        <div class="float-right d-none d-sm-inline-block">
            All rights reserved. <a href="#">Carrera Motor Shop and Services</a>.</strong>
        </div>
      </footer>
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    @livewireScripts

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
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
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
  
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable();
            $('#book_table1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "order": [[ 3, "desc" ]]
            });
            $('#book_tables').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });
            $('#category_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "order": [[ 2, "desc" ]]
            });
            $('#coupons_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "order": [[ 4, "desc" ]]
            });
            $('#employee_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "order": [[ 6, "desc" ]]
            });
            $('#orders_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "order": [[ 8, "desc" ]]
            });
            $('#orders_table2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "order": [[ 7, "desc" ]]
            });
            $('#services_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "order": [[ 2, "desc" ]]
            });
            $('#leave_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "order": [[ 5, "desc" ]]
            });
            $('#deductions_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "order": [[ 2, "desc" ]]
            });
            $('#inventory_table').DataTable();
            $('#coupons_report').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            
            });
            $('#sales_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });
            $('#services_r').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                
            });
        });

        /*=====================================================================================================*/

        /* ADD CATEGORY EVENT LISTENER START */
        window.addEventListener('openAddCategoryModal', function(){
          $('.addCategoryModal').find('span').html('');
          $('.addCategoryModal').find('form')[0].reset();
          $('.addCategoryModal').modal('show');
        });

        window.addEventListener('closeAddCategoryModal', function(){
          $('.addCategoryModal').find('span').html('');
          $('.addCategoryModal').find('form')[0].reset();
          $('.addCategoryModal').modal('hide');
        });
        /* ADD CATEGORY EVENT LISTENER END*/

        

        /* UPDATE CATEGORY EVENT LISTENER START */
        window.addEventListener('openUpdateCategoryModal', function(event){
          $('.updateCategoryModal').find('span').html('');
          $('.updateCategoryModal').modal('show');
        });

        window.addEventListener('closeUpdateCategoryModal', function(event){
          $('.updateCategoryModal').find('span').html('');
          $('.updateCategoryModal').find('form')[0].reset();
          $('.updateCategoryModal').modal('hide');
        });
        /* UPDATE CATEGORY EVENT LISTENER END */

        /*=====================================================================================================*/

        /* ADD COUPON EVENT LISTENER START */
        window.addEventListener('openAddCouponModal', function(){
          $('.addCouponModal').find('form')[0].reset();
          $('.addCouponModal').modal('show');
        });
      
        window.addEventListener('closeAddCouponModal', function(){
          $('.addCouponModal').find('span').html('');
          $('.addCouponModal').find('form')[0].reset();
          $('.addCouponModal').modal('hide');
        });
        /* ADD COUPON EVENT LISTENER END */


        /* UPDATE COUPON EVENT LISTENER START */
        window.addEventListener('openUpdateCouponModal', function(){
          $('.updateCouponModal').modal('show');
        })
        /* UPDATE COUPON EVENT LISTENER END */

        /*=====================================================================================================*/

        /* ADD SERVICE EVENT LISTENER START */
        window.addEventListener('openAddServiceModal', function(){
          $('.addServiceModal').find('form')[0].reset();
          $('.addServiceModal').modal('show');
        });

        window.addEventListener('closeAddServiceModal', function(){
          $('.addServiceModal').find('span').html('');
          $('.addServiceModal').find('form')[0].reset();
          $('.addServiceModal').modal('hide');
        });
        /* ADD SERVICE EVENT LISTENER END */

        /* UPDATE SERVICE EVENT LISTENER START */
        window.addEventListener('openUpdateServiceModal', function(){
          $('.updateServiceModal').modal('show');
        });
        /* UPDATE SERVICE EVENT LISTENER END */


        /*=====================================================================================================*/

        /* ADD EMPLOYEE EVENT LISTENER START */
        window.addEventListener('openAddEmployeeModal', function(){
          $('.addEmployeeModal').find('span').html('');
          $('.addEmployeeModal').find('form')[0].reset();
          $('.addEmployeeModal').modal('show');
        });

        window.addEventListener('closeAddEmployeeModal', function(){
          $('.addEmployeeModal').find('span').html('');
          $('.addEmployeeModal').find('form')[0].reset();
          $('.addEmployeeModal').modal('hide');
        });
        /* ADD EMPLOYEE EVENT LISTENER END */

        /* UPDATE EMPLOYEE EVENT LISTENER START */
        window.addEventListener('openUpdateEmployeeModal', function(event){
          $('.updateEmployeeModal').find('span').html('');
          $('.updateEmployeeModal').modal('show');
        });

        window.addEventListener('closeUpdateEmployeeModal', function(event){
          $('.updateEmployeeModal').find('span').html('');
          $('.updateEmployeeModal').find('form')[0].reset();
          $('.updateEmployeeModal').modal('hide');
        })
        /* UPDATE EMPLOYEE EVENT LISTENER END */

        /* DELETE EMPLOYEE EVENT LISTENER START */
        window.addEventListener('SwalConfirm', function(event){
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then(function(result){
            if (result.value) {
              window.livewire.emit('delete', event.detail.id);
            }
          });
        });
        /* DELETE EMPLOYEE EVENT LISTENER END */

        /*=====================================================================================================*/

        window.addEventListener('approveBookingModal', function(){
          $('.openApproveBookingModal').modal('show');
        });

        window.addEventListener('saveApprovedBookingModal', function(event){
          $('.openApproveBookingModal').find('form')[0].reset();
          $('.openApproveBookingModal').modal('hide');
        });

        window.addEventListener('updateBookingModal', function(event){
          $('.openModalBooking').modal('show');
        });

        window.addEventListener('saveUpdatedBookingModal', function(event){
          $('.openModalBooking').find('form')[0].reset();
          $('.openModalBooking').modal('hide');
        });

        //allowance modal

        /* ADD allowance EVENT LISTENER START */
        window.addEventListener('openAddAllowanceModal', function(){
          $('.addAllowanceModal').find('span').html('');
          $('.addAllowanceModal').find('form')[0].reset();
          $('.addAllowanceModal').modal('show');
        });

        window.addEventListener('closeAddAllowanceModal', function(){
          $('.addAllowanceModal').find('span').html('');
          $('.addAllowanceModal').find('form')[0].reset();
          $('.addAllowanceModal').modal('hide');
        });

        //deduction modal

        /* ADD deduction  EVENT LISTENER START */
        window.addEventListener('openAddDeductionModal', function(){
          $('.addDeductionModal').find('span').html('');
          $('.addDeductionModal').find('form')[0].reset();
          $('.addDeductionModal').modal('show');
        });

        window.addEventListener('closeAddDeductionModal', function(){
          $('.addDeductionModal').find('span').html('');
          $('.addDeductionModal').find('form')[0].reset();
          $('.addDeductionModal').modal('hide');
        });

    </script>

    @if (Session::has('allowance'))
        <script>
            toastr.success("{!! Session::get('allowance') !!}");
        </script>
    @endif
    </body>    
</html>
