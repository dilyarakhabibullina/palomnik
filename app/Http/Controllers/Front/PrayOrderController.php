<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Church;
use App\Models\Prayorder;
use App\Models\Treb;
use Illuminate\Http\Request;

class PrayorderController extends Controller
{
    public function indexTrebi()
    {
        $all_trebs = Treb::get();
        $all_churches = Church::get();
        return view('front.prayorder_trebs',compact('all_trebs','all_churches'));
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

        $obj = new Prayorder();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->list_name = $request->list_name;
        $obj->save();

        if ($request->has('treb')) {
            $obj->trebs()->attach($request->treb);
        }
        if ($request->has('church')) {
            $obj->churches()->attach($request->church);
        }

        return redirect()->back()->with('success', 'Требы успешно добавлены');

    }

    public function edit($id)
    {
        $pray_orders_date = Prayorder::where('id',$id)->first();
        return view('admin.amenity_edit', compact('pray_orders_date'));
    }

    public function update(Request $request,$id)
    {
        $obj = Prayorder::where('id',$id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success', 'Удобства успешно обновлены.');
    }

    public function delete($id)
    {
        $single_data = Prayorder::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Удобство успешно удалено.');
    }
}
