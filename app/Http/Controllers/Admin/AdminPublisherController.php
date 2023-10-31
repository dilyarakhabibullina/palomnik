<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class AdminPublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::get();
        return view('admin.books.publisher_view', compact('publishers'));
    }

    public function add()
    {
        return view('admin.books.publisher_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = new Publisher();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Издательство было добавлено .');

    }


    public function edit($id)
    {
        $publisher_data = Publisher::where('id',$id)->first();
        return view('admin.books.publisher_edit', compact('publisher_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = Publisher::where('id',$id)->first();
        $obj->name = $request->name;

        $obj->update();

        return redirect()->back()->with('success', 'Издательство было изменено.');
    }

    public function delete($id)
    {
        $single_data = Publisher::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Издательство было удалено.');
    }
}
