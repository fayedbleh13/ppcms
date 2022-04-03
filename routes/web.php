<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Services;
use App\Http\Livewire\Contact;
use App\Http\Livewire\AboutUs;
use App\Http\Livewire\Admin\AddAllowance;
use App\Http\Livewire\Admin\AddAttendance;
use App\Http\Livewire\CartDetails;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\UserList;
use App\Http\Livewire\Admin\AddCategory;
use App\Http\Livewire\Admin\AddCoupon;
use App\Http\Livewire\Admin\AddDeduction;
use App\Http\Livewire\Admin\AddLeave;
use App\Http\Livewire\Admin\AddPayslip;
use App\Http\Livewire\Admin\EditCategory;
use App\Http\Livewire\Admin\AddProduct;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\CategoryList;
use App\Http\Livewire\Admin\ServicesList;
use App\Http\Livewire\Admin\AddServices;
use App\Http\Livewire\Admin\CouponList;
use App\Http\Livewire\Admin\EditCoupon;
use App\Http\Livewire\Admin\ProductList;
use App\Http\Livewire\Admin\BookingList;
use App\Http\Livewire\Admin\EditService;
use App\Http\Livewire\Admin\AddService;
use App\Http\Livewire\Admin\Allowances;
use App\Http\Livewire\Admin\Attendances;
use App\Http\Livewire\Admin\Deductions;
use App\Http\Livewire\Admin\RequestCancel;
use App\Http\Livewire\Admin\EditAllowance;
use App\Http\Livewire\Admin\EditAttendance;
use App\Http\Livewire\Admin\EditBooking;
use App\Http\Livewire\Admin\EditDeduction;
use App\Http\Livewire\Admin\EditLeave;
use App\Http\Livewire\Admin\EditPayslip;
use App\Http\Livewire\Admin\EmployeeDetails;
use App\Http\Livewire\Admin\EmployeeList;
use App\Http\Livewire\Admin\OrderDetails;
use App\Http\Livewire\Admin\OrdersList;
use App\Http\Livewire\Admin\ServiceList;
use App\Http\Livewire\Admin\Inventory;
use App\Http\Livewire\Admin\LeaveList;
use App\Http\Livewire\Admin\PayslipDetails;
use App\Http\Livewire\Admin\Payslips;
use App\Http\Livewire\Admin\ProductDetails as AdminProductDetails;
use App\Http\Livewire\Admin\Sales;
use App\Http\Livewire\Admin\UpdateMechanicStatus;
use App\Http\Livewire\CategorySort;
use App\Http\Livewire\Delivery\DeliveryDashboard;
use App\Http\Livewire\Delivery\DeliveryOrderDetails;
use App\Http\Livewire\Delivery\DeliveryOrderHistory;
use App\Http\Livewire\HeaderSearch;
use App\Http\Livewire\OrderPlaced;
use App\Http\Livewire\ProductDetails;

use App\Http\Livewire\WalkinPos\Index;

use App\Http\Livewire\Search;
use App\Http\Livewire\User\BookingsHistory;
use App\Http\Livewire\User\CurrentBookings;
use App\Http\Livewire\User\CurrentOrders;
use App\Http\Livewire\User\OrderHistory;
use App\Http\Livewire\User\UserOrderDetails;
use App\Http\Livewire\WalkInPos\TransactionDetails;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//for user or customer dashboard
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
    // Route::get('/user/dashboard/{id}', UserDashboard::class)->name('user.dashboard');
    Route::get('/user/current-orders', CurrentOrders::class)->name('user.orders');
    Route::get('/user/order-history', OrderHistory::class)->name('user.orders-history');
    Route::get('/user/bookings-history', BookingsHistory::class)->name('user.bookings-history');
    Route::get('/user/current-bookings', CurrentBookings::class)->name('user.bookings');
    Route::get('/user/user-order-details/{order_id}', UserOrderDetails::class)->name('user.order-details');
});

//for admin dashboard
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/user-list', UserList::class)->name('admin.user-list');

    Route::get('/admin/add-product', AddProduct::class)->name('admin.add-product');
    Route::get('/admin/edit-product/{product_slug}', EditProduct::class)->name('admin.edit-product');
    Route::get('/admin/product-list', ProductList::class)->name('admin.product-list');
    Route::get('/admin/product-details/{product_slug}', AdminProductDetails::class)->name('admin.product-details');

    Route::get('/admin/edit-category/{category_slug}', EditCategory::class)->name('admin.edit-category');
    Route::get('/admin/add-category', AddCategory::class)->name('admin.add-category');
    Route::get('/admin/category-list', CategoryList::class)->name('admin.category-list');

    Route::get('/admin/edit-coupon/{coupon_id}', EditCoupon::class)->name('admin.edit-coupon');
    Route::get('/admin/add-coupon', AddCoupon::class)->name('admin.add-coupon');
    Route::get('/admin/coupon-list', CouponList::class)->name('admin.coupon-list');

    Route::get('/admin/booking-list', BookingList::class)->name('admin.booking-list');
    Route::get('/admin/update-mechanic-status', UpdateMechanicStatus::class)->name('admin.update_status');
    Route::get('/admin/edit-booking/{booking_id}', EditBooking::class)->name('admin.edit-booking');

    Route::get('/admin/orders-list', OrdersList::class)->name('admin.order-list');
    Route::get('/admin/orders/{order_id}', OrderDetails::class)->name('admin.order-details');

    Route::get('/admin/add-services', AddServices::class)->name('admin.add-services');
    Route::get('/admin/edit-services/{service_id}', EditService::class)->name('admin.edit-services');
    Route::get('/admin/services-list', ServicesList::class)->name('admin.services-list');

    //payroll pages below
    Route::get('/admin/employee-list', EmployeeList::class)->name('admin.employee-list');
    Route::get('/admin/employee-details/{emp_id}', EmployeeDetails::class)->name('admin.employee-details');

    Route::get('/admin/attendances', Attendances::class)->name('admin.attendance-list');
    Route::get('/admin/add-attendance', AddAttendance::class)->name('admin.add-attendance');
    Route::get('/admin/edit-attendance/{attendance_id}', EditAttendance::class)->name('admin.edit-attendance');

    Route::get('/admin/request-cancel/{booking_id}', RequestCancel::class)->name('admin.request-cancel');

    Route::get('/admin/allowances', Allowances::class)->name('admin.allowances');
    Route::get('/admin/add-allowance', AddAllowance::class)->name('admin.add-allowance');
    Route::get('/admin/edit-allowance/{allowance_id}', EditAllowance::class)->name('admin.edit-allowance');

    Route::get('/admin/deductions', Deductions::class)->name('admin.deductions');
    Route::get('/admin/add-deduction', AddDeduction::class)->name('admin.add-deduction');
    Route::get('/admin/edit-deduction/{deduction_id}', EditDeduction::class)->name('admin.edit-deduction');

    Route::get('/admin/leave-list', LeaveList::class)->name('admin.leave-list');
    Route::get('/admin/add-leave', AddLeave::class)->name('admin.add-leave');
    Route::get('/admin/edit-leave/{leave_id}', EditLeave::class)->name('admin.edit-leave');

    Route::get('/admin/payslips', Payslips::class)->name('admin.payslips');
    Route::get('/admin/payslip-details/{payroll_id}', PayslipDetails::class)->name('admin.payslip-details');
    Route::get('/admin/add-payslip', AddPayslip::class)->name('admin.add-payslip');
    Route::get('/admin/edit-payslip/{payroll_id}', EditPayslip::class)->name('admin.edit-payslip');

    //shop reports below
    Route::get('/admin/inventory', Inventory::class)->name('admin.inventory');
    Route::get('/admin/sales', Sales::class)->name('admin.sales');
    
});

Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/walk-in-pos/index', Index::class)->name('cashier.pos');
    Route::get('/walk-in-pos/transaction-details/{order_id}', TransactionDetails::class)->name('cashier.transaction-details');
});

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/delivery/delivery-dashboard', DeliveryDashboard::class)->name('delivery.dashboard');
    Route::get('/delivery/delivery-order-details/{order_id}', DeliveryOrderDetails::class)->name('delivery.order-details');
    Route::get('/delivery/delivery-order-history', DeliveryOrderHistory::class)->name('delivery.history');
});

Route::get('/',HomeComponent::class);
Route::get('/home',HomeComponent::class);

Route::get('/shop',Shop::class);

Route::get('/services',Services::class);

Route::get('/contact',Contact::class);

Route::get('/about_us',AboutUs::class);

Route::get('/cart',CartDetails::class)->name('product.cart');

Route::get('/checkout',Checkout::class)->name('checkout');

Route::get('/product/{slug}',ProductDetails::class)->name('product.details');

Route::get('/product-category/{category_slug}', CategorySort::class)->name('product.category');

Route::get('/search', Search::class)->name('product.search');

Route::get('/order-placed', OrderPlaced::class)->name('order');