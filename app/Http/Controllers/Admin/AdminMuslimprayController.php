<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mosque;
use App\Models\Pray;
use Illuminate\Http\Request;

class AdminMuslimprayController extends Controller
{
    public function index()
    {
        $muslimprays = Pray::get();
        return view('admin.muslimprays.muslimpray_view', compact('muslimprays'));
    }

    public function add()
    {
        return view('admin.muslimprays.muslimpray_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = new Pray();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Категория была добавлена');

    }


    public function edit($id)
    {
        $muslimpray_data = Pray::where('id',$id)->first();
        return view('admin.muslimprays.muslimpray_edit', compact('muslimpray_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = Pray::where('id',$id)->first();
        $obj->name = $request->name;

        $obj->update();

        return redirect()->back()->with('success', 'Категория была изменена.');
    }

    public function delete($id)
    {
        $single_data = Pray::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Категория была удалена.');
    }
}
