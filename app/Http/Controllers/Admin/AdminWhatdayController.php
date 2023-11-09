<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Whatday;
use Illuminate\Http\Request;

class AdminWhatdayController extends Controller
{
    public function index()
    {
        $whatdays = Whatday::get();
        return view('admin.excursions.whatday_view', compact('whatdays'));
    }

    public function add()
    {
        return view('admin.excursions.whatday_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'shortname' => 'required',
            'whatday' => 'required',

        ]);

        $obj = new Whatday();
        $obj->name = $request->name;
        $obj->shortname = $request->shortname;
        $obj->whatday = $request->whatday;
        $obj->save();

        return redirect()->back()->with('success', 'День был добавлен .');

    }


    public function edit($id)
    {
        $whatday_data = Whatday::where('id',$id)->first();
        return view('admin.excursions.whatday_edit', compact('whatday_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'shortname' => 'required',
            'whatday' => 'required',
        ]);

        $obj = Whatday::where('id',$id)->first();
        $obj->name = $request->name;
        $obj->shortname = $request->shortname;
        $obj->whatday = $request->whatday;
        $obj->update();

        return redirect()->back()->with('success', 'День был изменен.');
    }

    public function delete($id)
    {
        $single_data = Whatday::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'День был удален.');
    }
}
