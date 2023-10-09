<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;


class PrayOrderController extends Controller
{
    public function indexMuslim() {
        return view('front.prayorder_musulmun_prays');
    }
}
