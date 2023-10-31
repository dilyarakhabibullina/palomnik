<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class AdminGenreController extends Controller
{
    public function index()
    {
        $genres = Genre::get();
        return view('admin.books.genre_view', compact('genres'));
    }

    public function add()
    {
        return view('admin.books.genre_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = new Genre();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Жанр был добавлен .');

    }


    public function edit($id)
    {
        $genre_data = Genre::where('id',$id)->first();
        return view('admin.books.genre_edit', compact('genre_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $obj = Genre::where('id',$id)->first();
        $obj->name = $request->name;

        $obj->update();

        return redirect()->back()->with('success', 'Жанр был изменен.');
    }

    public function delete($id)
    {
        $single_data = Genre::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Жанр был удален.');
    }
}
