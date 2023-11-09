<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendarchrist;
use Illuminate\Http\Request;

class AdminCalendarchristController extends Controller
{
    public function index()
    {
        $calendarchrists = Calendarchrist::get();
        return view('admin.calendarchrists.view', compact('calendarchrists'));
    }

    public function add()
    {
        return view('admin.calendarchrists.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required',

        ]);


        $obj = new Calendarchrist();
        $obj->title = $request->title;
        $obj->color = $request->color;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->save();

        return redirect()->back()->with('success', 'Дата была добавлена .');

    }


    public function edit($id)
    {
        $calendarchrist_data = Calendarchrist::where('id',$id)->first();
        return view('admin.calendarchrists.edit', compact('calendarchrist_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'start_date' => 'required',

        ]);

        $obj = Calendarchrist::where('id', $id)->first();
        $obj->title = $request->title;
        $obj->color = $request->color;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->update();

        return redirect()->back()->with('success', 'Дата была изменена.');
    }

    public function delete($id)
    {
        $single_data = Calendarchrist::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Дата была удалена.');
    }
}
