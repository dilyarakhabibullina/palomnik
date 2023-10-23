<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mosque;
use App\Models\Prayordermuslim;
use App\Models\Pray;
use Illuminate\Http\Request;

class AdminPrayorderMuslimController extends Controller
{
    public function index()
    {

        $prayordersmuslims = Prayordermuslim::with('muslimprays', 'mosques' )->latest()->paginate(15);
        return view('admin.muslimprays.prayordermuslim_view',compact('prayordersmuslims'));
    }

    public function add()

    {

        $all_muslimprays = Pray::get();
        $all_mosques = Mosque::get();
        return view('admin.muslimprays.prayordermuslim_add',compact('all_muslimprays','all_mosques'));
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

        return redirect()->back()->with('success', 'Молитва добавлена в заказ');
    }

    public function edit($id)
    {
        $all_muslimprays = Pray::get();
        $all_mosques = Mosque::get();

        $prayordermuslim_data = Prayordermuslim::where('id', $id)->first();

        return view('admin.muslimprays.prayordermuslim_edit', compact('prayordermuslim_data','all_muslimprays','all_mosques'));
    }
    public function show($id)
    {
        //
    }

    public function update(Request $request,$id)
    {
        $obj = Prayordermuslim::where('id',$id)->first();


        if ($request->has('muslimpray')) {
            $obj->muslimprays()->sync($request->muslimpray);
        }
        if ($request->has('mosque')) {
            $obj->mosques()->sync($request->mosque);
        }


        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'list_name' => 'required'
        ]);


        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->list_name = $request->list_name;
        $obj->update();

        return redirect()->back()->with('success', 'Заказанная молитва была изменена');
    }

    public function delete($id)
    {
        $single_data = Prayordermuslim::where('id',$id)->first();
        $single_data->delete();
        return redirect()->back()->with('success', 'Заказанная молитва удалена');
    }


}
