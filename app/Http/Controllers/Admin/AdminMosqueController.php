<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mosque;
use Illuminate\Http\Request;

class AdminMosqueController extends Controller
{
    public function index()
    {
        $mosques = Mosque::get();
        return view('admin.muslimprays.mosque_view', compact('mosques'));
    }

    public function add()
    {
        return view('admin.muslimprays.mosque_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = new Mosque();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Мечеть была добавлена');

    }


    public function edit($id)
    {
        $mosque_data = Mosque::where('id',$id)->first();
        return view('admin.muslimprays.mosque_edit', compact('mosque_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = Mosque::where('id',$id)->first();
        $obj->name = $request->name;

        $obj->update();

        return redirect()->back()->with('success', 'Мечеть была изменена');
    }

    public function delete($id)
    {
        $single_data = Mosque::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Мечеть была удалена');
    }
}
