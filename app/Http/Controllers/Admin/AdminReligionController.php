<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use Illuminate\Http\Request;

class AdminReligionController extends Controller
{
    public function index()
    {
        $religions = Religion::get();
        return view('admin.books.religion_view', compact('religions'));
    }

    public function add()
    {
        return view('admin.books.religion_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = new Religion();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Религия была добавлена .');

    }


    public function edit($id)
    {
        $religion_data = Religion::where('id',$id)->first();
        return view('admin.books.religion_edit', compact('religion_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = Religion::where('id',$id)->first();
        $obj->name = $request->name;

        $obj->update();

        return redirect()->back()->with('success', 'Религия была изменена.');
    }

    public function delete($id)
    {
        $single_data = Religion::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Религия была удалена.');
    }
}
