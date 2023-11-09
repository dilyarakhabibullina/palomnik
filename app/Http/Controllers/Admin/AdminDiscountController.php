<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Genre;
use App\Models\Discount;
use App\Models\ExcursionDiscount;
use Illuminate\Http\Request;
use function redirect;
use function view;

class AdminDiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::get();
        return view('admin.excursions.discount_view', compact('discounts'));
    }

    public function add()
    {
        return view('admin.excursions.discount_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
        ]);

        $obj = new Discount();
        $obj->name = $request->name;
        $obj->discount = $request->discount;
        $obj->save();

        return redirect()->back()->with('success', 'Скидка была добавлена .');

    }


    public function edit($id)
    {
        $discount_data = Discount::where('id',$id)->first();
        return view('admin.excursions.discount_edit', compact('discount_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
        ]);

        $obj = Discount::where('id',$id)->first();
        $obj->name = $request->name;
        $obj->discount = $request->discount;
        $obj->update();

        return redirect()->back()->with('success', 'Скидка была изменена.');
    }

    public function delete($id)
    {
        $single_data = Discount::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Скидка была удалена.');
    }
}
