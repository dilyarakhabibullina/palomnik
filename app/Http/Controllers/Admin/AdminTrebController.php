<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Treb;
use Illuminate\Http\Request;

class AdminTrebController extends Controller
{
    public function index()
    {
        $trebs = Treb::get();
        return view('admin.trebs.treb_view', compact('trebs'));
    }

    public function add()
    {
        return view('admin.trebs.treb_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = new Treb();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Категория была добавлена .');

    }


    public function edit($id)
    {
        $treb_data = Treb::where('id',$id)->first();
        return view('admin.trebs.treb_edit', compact('treb_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = Treb::where('id',$id)->first();
        $obj->name = $request->name;

        $obj->update();

        return redirect()->back()->with('success', 'Категория была изменена.');
    }

    public function delete($id)
    {
        $single_data = Treb::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Категория была удалена.');
    }
}
