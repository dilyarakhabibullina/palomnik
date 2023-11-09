<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OrderbookDetail;
use App\Models\OrderexcurDetail;
use Illuminate\Http\Request;
use Auth;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('customer_id',Auth::guard('customer')->user()->id)->get();
        return view('customer.orders', compact('orders'));
    }

    public function invoice($id)
    {
        $order = Order::where('id',$id)->first();
        $order_detail = OrderDetail::where('order_id',$id)->get();
        $orderbook_detail = OrderbookDetail::where('order_id',$id)->get();
        $orderexcur_detail = OrderexcurDetail::where('order_id',$id)->get();

        return view('customer.invoice', compact('order','order_detail','orderbook_detail','orderexcur_detail'));
    }
}
