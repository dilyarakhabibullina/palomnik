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

    public function sendmail(Request $request)
    {


        $prayorder_data= Prayorder::where('id', $request->id)->with('trebs', 'churches')->first();

        foreach ($prayorder_data->trebs as $treb){
            $treb_category = $treb->name;
        };
        foreach ($prayorder_data->churches as $church){
            $church_name = $church->name;
            $church_email = $church->email;
        };

        // Send email
        $subject = 'Треба от сайта религиозного туризма ';
        $message =  '<br><strong>Заказчик: </strong>'.$prayorder_data->name ;
        $message .= '<br><strong>Категория требы: </strong>'.$treb_category;
        $message .= '<br><strong>Адрес эл.почты заказчика: </strong>'.$prayorder_data ->email;
        $message .= '<br><strong>Список имен: </strong>'.$prayorder_data->list_name;




        \Mail::to($church_email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', 'Заказанный треб послан в  '.$church_name);

    }

}
