<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminLangController extends Controller
{
    public function index()
    {
        $langs = Lang::get();
        return view('admin.books.lang_view', compact('langs'));
    }

    public function add()
    {
        return view('admin.books.lang_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = new Lang();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Язык был добавлен .');

    }


    public function edit($id)
    {
        $lang_data = Lang::where('id',$id)->first();
        return view('admin.books.lang_edit', compact('lang_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = Lang::where('id',$id)->first();
        $obj->name = $request->name;

        $obj->update();

        return redirect()->back()->with('success', 'Язык был изменен.');
    }

    public function delete($id)
    {
        $single_data = Lang::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Язык был удален.');
    }
}
