<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Placevisit;
use Illuminate\Http\Request;

class AdminPlacevisitController extends Controller
{
    public function index()
    {
        $placevisits = Placevisit::get();
        return view('admin.excursions.placevisit_view', compact('placevisits'));
    }

    public function add()
    {
        return view('admin.excursions.placevisit_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = new Placevisit();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Место посещения добавлено .');

    }


    public function edit($id)
    {
        $placevisit_data = Placevisit::where('id',$id)->first();
        return view('admin.excursions.placevisit_edit', compact('placevisit_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $obj = Placevisit::where('id',$id)->first();
        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success', 'Место посещения было изменено.');
    }

    public function delete($id)
    {
        $single_data = Placevisit::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Место посещения было удалено.');
    }
}
