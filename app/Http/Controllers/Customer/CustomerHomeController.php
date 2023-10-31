<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class CustomerHomeController extends Controller
{
    public function index()
    {

        return view('customer.home');
    }
}
