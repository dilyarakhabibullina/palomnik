<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Mosque;
use App\Models\Prayordermuslim;
use App\Models\Pray;
use Illuminate\Http\Request;
use App\Models\PrayordermuslimMosque;
use App\Models\PrayordermuslimPray;

class PrayorderMuslimController extends Controller
{
    public function indexMuslimPrays()
    {
        $all_muslimprays = Pray::get();
        $all_mosques = Mosque::get();
        return view('front.prayorder_muslimprays',compact('all_muslimprays','all_mosques'));
    }


    public function add()
    {
        return view('admin.amenity_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'list_name' => 'required',
        ]);

        $obj = new Prayordermuslim();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->list_name = $request->list_name;
        $obj->save();

        if ($request->has('muslimpray')) {
            $obj->muslimprays()->attach($request->muslimpray);
        }
        if ($request->has('mosque')) {
            $obj->mosques()->attach($request->mosque);
        }

        return redirect()->back()->with('success', 'Требы успешно добавлены');

    }

    public function edit($id)
    {
        $pray_orders_date = Prayordermuslim::where('id',$id)->first();
        return view('admin.amenity_edit', compact('pray_orders_date'));
    }

    public function update(Request $request,$id)
    {
        $obj = Prayordermuslim::where('id',$id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success', 'Удобства успешно обновлены.');
    }

    public function delete($id)
    {
        $single_data = Prayordermuslim::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Заказ успешно удалено.');
    }
}
