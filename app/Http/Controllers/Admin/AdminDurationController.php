<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Duration;
use Illuminate\Http\Request;

class AdminDurationController extends Controller
{
    public function index()
    {
        $durations = Duration::get();
        return view('admin.excursions.duration_view', compact('durations'));
    }

    public function add()
    {
        return view('admin.excursions.duration_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start' => 'required',

        ]);


        $obj = new Duration();
        $obj->start = $request->start;
        $obj->save();

        return redirect()->back()->with('success', 'Период экскурсии был добавлен .');

    }


    public function edit($id)
    {
        $duration_data = Duration::where('id',$id)->first();
        return view('admin.excursions.duration_edit', compact('duration_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'start' => 'required',

        ]);

        $obj = Duration::where('id',$id)->first();
        $obj->start = $request->start;

        $obj->update();

        return redirect()->back()->with('success', 'Период экскурсии был изменена.');
    }

    public function delete($id)
    {
        $single_data = Duration::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Период экскурсии был удален.');
    }
}
