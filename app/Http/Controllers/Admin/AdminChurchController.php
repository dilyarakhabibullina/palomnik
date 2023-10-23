<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Church;
use Illuminate\Http\Request;

class AdminChurchController extends Controller
{
    public function index()
    {
        $churches = Church::get();
        return view('admin.trebs.church_view', compact('churches'));
    }

    public function add()
    {
        return view('admin.trebs.church_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $obj = new Church();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->save();

        return redirect()->back()->with('success', 'Церковь была добавлена .');

    }


    public function edit($id)
    {
        $church_data = Church::where('id',$id)->first();
        return view('admin.trebs.church_edit', compact('church_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $obj = Church::where('id',$id)->first();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->update();

        return redirect()->back()->with('success', 'Церковь была изменена.');
    }

    public function delete($id)
    {
        $single_data = Church::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Церковь была удалена.');
    }
}
