<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Service;
use Carbon\CarbonImmutable;
use Livewire\Component;
use DB;
use Illuminate\Support\Carbon;

class Sales extends Component
{
    public $total;
    public $daily;
    public $monthly;
    public $ifweekly;
    public $annually;


    public function render()
    {   
       
        $en = CarbonImmutable::now()->locale('en_US');    
        $weekly = Order::whereBetween('created_at', [$en->startOfWeek(Carbon::MONDAY), $en->endOfWeek(Carbon::SUNDAY)])->sum('total');
        $weekly_services = Booking::whereBetween('created_at', [$en->startOfWeek(Carbon::MONDAY), $en->endOfWeek(Carbon::SUNDAY)])->sum('price_fee');
    
        $book = Booking::all();
        $transaction = Transaction::all();
        $sales = Order::join('transactions', 'orders.id', '=', 'transactions.order_id')
                        ->select('orders.*', 'transactions.*')
                        ->where('transactions.trans_status', 'approved')
                        ->sum('orders.total');

        $sales_service = Service::join('bookings', 'services.id', '=', 'bookings.service_id')
                                ->select('services.*', 'bookings.*')
                                ->where('bookings.booking_status', 1)
                                ->sum('services.price_fee');
        
        // $sales_service = Booking::orderBy('created_at', 'desc')->where('booking_status', 1)
        //                             ->groupBy('booking_status')
        //                             ->selectRaw('sum(price_fee) as price_fee, booking_status')
        //                             ->get();
        $total = DB::table('bookings')->sum('price_fee');
        $daily = Order::whereDate('created_at', Carbon::today())->sum('total');

        $ws = Order::join('transactions', 'orders.id', '=', 'transactions.order_id')
                    ->select([
                        DB::raw('count(orders.id) as quantity'),
                        DB::raw('sum(orders.total) as total'),
                        DB::raw('week(orders.created_at) as week'),
                        DB::raw('year(orders.created_at) as year')
                    ])
                    ->where('transactions.trans_status', 'approved')
                    ->groupBy(['year', 'week'])
                    ->get();

        $ss = Service::join('bookings', 'services.id', '=', 'bookings.service_id')
                    ->select([
                        DB::raw('count(bookings.id) as quantity'), 
                        DB::raw('sum(services.price_fee) as tot'),
                        DB::raw('week(bookings.created_at) as week'),
                        DB::raw('year(bookings.created_at) as year')
                    ])
                    ->where('bookings.booking_status', 1)
                    ->groupBy(['year', 'week'])
                    ->get();

        $ords = Booking::join('services', 'bookings.id', '=', 'services.booking_id')->select('services.*', 'bookings.*')
                        ->where('booking.booking_status', 1);

        return view('livewire.admin.sales', [
                                'ss' => $ss,
                                'ws'=>$ws, 
                                'book' => $book, 
                                'transaction' => $transaction, 
                                'sales_service' => $sales_service, 
                                'total' => $total, 
                                'weekly_services' => $weekly_services, 
                                'sales' => $sales, 
                                'daily' => $daily, 
                                'weekly' => $weekly, 
                                'ords'=>$ords])
                                ->layout('layouts.admin');
    }
}
