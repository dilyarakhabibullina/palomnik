<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Duration;
use App\Models\Excursion;
use App\Models\Placevisit;
use App\Models\Whatday;
use Illuminate\Http\Request;



class AdminExcursionController extends Controller
{
    public function index()
    {

        $excursions = Excursion::with('discounts','durations','placevisits','whatdays' )->latest()->paginate(15);
        return view('admin.excursions.excursion_view',compact('excursions'));
    }

    public function add()

    {
        $all_durations = Duration::get();
        $all_discounts = Discount::get();
        $all_whatdays = Whatday::get();
        $all_placevisits = Placevisit::get();
        return view('admin.excursions.excursion_add',compact('all_discounts','all_durations','all_whatdays','all_placevisits'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'featured_photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);

        $ext = $request->file('featured_photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('featured_photo')->move(public_path('uploads/excursions/'),$final_name);

        $obj = new Excursion();
        $obj->featured_photo = $final_name;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->descriptionZone = $request->descriptionZone;
        $obj->fullDescription = $request->fullDescription;
        $obj->price = $request->price;
        $obj->placeMeeting = $request->placeMeeting;
        $obj->startDateExcursion = $request->startDateExcursion;
        $obj->finishDateExcursion = $request->finishDateExcursion;
        $obj->durationExcursion = $request->durationExcursion;
        $obj->guide = $request->guide;
        $obj->transport = $request->transport;
        $obj->save();

        if ($request->has('arr_discounts')) {
            $obj->discounts()->attach($request->arr_discounts);
        }

        if ($request->has('arr_durations')) {
            $obj->durations()->attach($request->arr_durations);
        }

        if ($request->has('arr_whatdays')) {
            $obj->whatdays()->attach($request->arr_whatdays);
        }

        if ($request->has('arr_placevisits')) {
            $obj->placevisits()->attach($request->arr_placevisits);
        }

        return redirect()->back()->with('success', 'Экскурсия добавлена.');

    }

    public function edit($id)
    {

        $all_discounts = Discount::get();
        $all_durations = Duration::get();
        $all_whatdays = Whatday::get();
        $all_placevisits = Placevisit::get();
        $excursion_data = Excursion::where('id',$id)->first();

        return view('admin.excursions.excursion_edit', compact('excursion_data','all_discounts','all_durations','all_whatdays','all_placevisits'));
    }
    public function show($id)
    {
        //
    }

    public function update(Request $request,$id)
    {
        $obj = Excursion::where('id',$id)->first();


        if ($request->has('discounts')) {
            $obj->discounts()->sync($request->discounts);
        }
        if ($request->has('durations')) {
            $obj->durations()->sync($request->durations);
        }
        if ($request->has('placevisits')) {
            $obj->placevisits()->sync($request->placevisits);
        }
        if ($request->has('whatdays')) {
            $obj->whatdays()->sync($request->whatdays);
        }

        $request->validate([
            //  'title' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);

        if($request->hasFile('featured_photo')) {
            $request->validate([
                'featured_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/excursions/'.$obj->featured_photo));
            $ext = $request->file('featured_photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('featured_photo')->move(public_path('uploads/excursions/'),$final_name);
            $obj->featured_photo = $final_name;
        }



        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->descriptionZone = $request->descriptionZone;
        $obj->fullDescription = $request->fullDescription;
        $obj->price = $request->price;
        $obj->placeMeeting = $request->placeMeeting;
        $obj->startDateExcursion = $request->startDateExcursion;
        $obj->finishDateExcursion = $request->finishDateExcursion;
        $obj->durationExcursion = $request->durationExcursion;
        $obj->guide = $request->guide;
        $obj->transport = $request->transport;


        $obj->update();

        return redirect()->back()->with('success', 'Экскурсия изменена.');
    }

    public function delete($id)
    {
        $single_data = Excursion::where('id',$id)->first();
        //   unlink(public_path('uploads/'.$single_data->featured_photo));
        $single_data->delete();
        return redirect()->back()->with('success', 'Экскурсия удалена.');
    }

}
