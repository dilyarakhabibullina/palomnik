<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Church;
use App\Models\Prayorder;
use App\Models\Treb;
use Illuminate\Http\Request;

class AdminPrayorderController extends Controller
{
    public function index()
    {

        $prayorders = Prayorder::with('trebs', 'churches')->latest()->paginate(15);
        return view('admin.trebs.prayorder_view', compact('prayorders'));
    }

    public function add()

    {

        $all_trebs = Treb::get();
        $all_churches = Church::get();
        return view('admin.trebs.prayorder_add', compact('all_trebs', 'all_churches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'list_name' => 'required',
        ]);

        $obj = new Prayorder();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->list_name = $request->list_name;
        $obj->save();

        if ($request->has('treb')) {
            $obj->trebs()->attach($request->treb);
        }
        if ($request->has('church')) {
            $obj->churches()->attach($request->church);
        }

        return redirect()->back()->with('success', 'Заказная треба добавлена.');
    }

    public function edit($id)
    {
        $all_trebs = Treb::get();
        $all_churches = Church::get();

        $prayorder_data = Prayorder::where('id', $id)->first();


        return view('admin.trebs.prayorder_edit', compact('prayorder_data', 'all_trebs', 'all_churches'));
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $obj = Prayorder::where('id', $id)->first();


        if ($request->has('treb')) {
            $obj->trebs()->sync($request->treb);
        }
        if ($request->has('church')) {
            $obj->churches()->sync($request->church);
        }


        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'list_name' => 'required'
        ]);


        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->list_name = $request->list_name;
        $obj->update();

        return redirect()->back()->with('success', 'Заказанный треб изменен.');
    }

    public function delete($id)
    {
        $single_data = Prayorder::where('id', $id)->first();
        $single_data->delete();
        return redirect()->back()->with('success', 'Заказанный треб удален.');
    }


}
