<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\PrayorderMuslimController;
use App\Models\Book;
use App\Models\Customer;
use App\Models\Excursion;
use App\Models\Order;
use App\Models\Prayordermuslim;
use App\Models\PrayorderTreb;
use App\Models\Room;
use App\Models\Subscriber;
use App\Models\Treb;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $total_completed_orders = Order::where('status','Completed')->count();
        $total_pending_orders = Order::where('status','Pending')->count();
        $total_active_customers = Customer::where('status',1)->count();
        $total_pending_customers = Customer::where('status',0)->count();
        $total_rooms = Room::count();
        $total_books = Book::count();
        $total_prayordertrebs = PrayorderTreb::count();
        $total_prayordermuslims = Prayordermuslim::count();
        $total_excursions = Excursion::count();
        $total_nonconfirmedsubscribers = Subscriber::where('status',0)->count();
        $total_subscribers = Subscriber::where('status',1)->count();

        $orders = Order::orderBy('id','desc')->skip(0)->take(5)->get();

        return view('admin.home', compact('total_completed_orders','total_pending_orders','total_active_customers','total_pending_customers','total_rooms','total_subscribers','orders','total_books','total_excursions','total_nonconfirmedsubscribers','total_prayordertrebs','total_prayordermuslims'));
    }
}
