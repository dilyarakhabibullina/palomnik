<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


class PrayOrderController extends Controller
{
    public function index() {
        return view('front.prayorder');
    }
}
