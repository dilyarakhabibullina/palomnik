<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AdminAuthorController extends Controller
{
    public function index()
    {
        $authors = Author::get();
        return view('admin.books.author_view', compact('authors'));
    }

    public function add()
    {
        return view('admin.books.author_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',

        ]);

        $obj = new Author();
        $obj->fullname = $request->fullname;
        $obj->save();

        return redirect()->back()->with('success', 'Автор был добавлен .');

    }


    public function edit($id)
    {
        $author_data = Author::where('id',$id)->first();
        return view('admin.books.author_edit', compact('author_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'fullname' => 'required',

        ]);

        $obj = Author::where('id',$id)->first();
        $obj->fullname = $request->fullname;

        $obj->update();

        return redirect()->back()->with('success', 'Автор был изменен.');
    }

    public function delete($id)
    {
        $single_data = Author::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', 'Автор был удален.');
    }
}
