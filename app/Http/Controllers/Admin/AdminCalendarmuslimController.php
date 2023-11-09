<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendarmuslim;
use Illuminate\Http\Request;

class AdminCalendarmuslimController extends Controller
{
    public function index()
    {
        $calendarmuslims = Calendarmuslim::get();
        return view('admin.calendarmuslims.view', compact('calendarmuslims'));
    }

    public function add()
    {
        return view('admin.calendarmuslims.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required',

        ]);


        $obj = new Calendarmuslim();
        $obj->title = $request->title;
        $obj->color = $request->color;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->save();

        return redirect()->back()->with('success', 'Дата была добавлена .');

    }


    public function edit($id)
    {
        $calendarmuslim_data = Calendarmuslim::where('id',$id)->first();
        return view('admin.calendarmuslims.edit', compact('calendarmuslim_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'start_date' => 'required',

        ]);

        $obj = Calendarmuslim::where('id', $id)->first();
        $obj->title = $request->title;
        $obj->color = $request->color;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->update();

        return redirect()->back()->with('success', 'Дата была изменена.');
    }

    public function delete($id)
    {
        $single_data = Calendarmuslim::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Дата была удалена.');
    }
}
