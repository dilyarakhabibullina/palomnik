<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Lang;
use App\Models\Publisher;
use App\Models\Religion;

use Illuminate\Http\Request;

class AdminBookController extends Controller
{
    public function index()
    {

        $books = Book::with('authors', 'genres','publishers','religions', 'langs' )->latest()->paginate(15);
        return view('admin.books.book_view',compact('books'));
    }

    public function add()

    {
        $all_religions = Religion::get();
        $all_publishers = Publisher::get();
        $all_langs = Lang::get();
        $all_authors = Author::get();
        $all_genres = Genre::get();
        return view('admin.books.book_add',compact('all_genres','all_publishers', 'all_authors','all_langs','all_religions'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'featured_photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'pages' => 'required'
        ]);

        $ext = $request->file('featured_photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('featured_photo')->move(public_path('uploads/books/'),$final_name);

        $obj = new Book();
        $obj->featured_photo = $final_name;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->fullDescription = $request->fullDescription;
        $obj->price = $request->price;
        $obj->pages = $request->pages;
        $obj->published = $request->published;
        $obj->slug = 'slug';
        $obj->save();

       if ($request->has('arr_genres')) {
            $obj->genres()->attach($request->arr_genres);
       }
        if ($request->has('arr_langs')) {
            $obj->langs()->attach($request->arr_langs);
        }
        if ($request->has('arr_religions')) {
            $obj->religions()->attach($request->arr_religions);
        }
        if ($request->has('arr_publishers')) {
            $obj->publishers()->attach($request->arr_publishers);
        }
        if ($request->has('arr_authors')) {
            $obj->authors()->attach($request->arr_authors);
        }

        return redirect()->back()->with('success', 'Книга добавлена.');

    }

    public function edit($id)
    {
        $all_religions = Religion::get();
        $all_publishers = Publisher::get();
        $all_langs = Lang::get();
        $all_authors = Author::get();
        $all_genres = Genre::get();
        $book_data = Book::where('id',$id)->first();



        return view('admin.books.book_edit', compact('book_data','all_genres','all_authors','all_publishers','all_langs','all_religions'));
    }
    public function show($id)
    {
        //
    }

    public function update(Request $request,$id)
    {
        $obj = Book::where('id',$id)->first();



        if ($request->has('genres')) {
            $obj->genres()->sync($request->genres);
        }
       if ($request->has('langs')) {
           $obj->langs()->sync($request->langs);
        }
        if ($request->has('religions')) {
            $obj->religions()->sync($request->religions);
        }
        if ($request->has('publishers')) {
            $obj->publishers()->sync($request->publishers);
        }
        if ($request->has('authors')) {
            $obj->authors()->sync($request->authors);
        }

        $request->validate([
          //  'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'pages' => 'required'
        ]);

        if($request->hasFile('featured_photo')) {
            $request->validate([
                'featured_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/books/'.$obj->featured_photo));
            $ext = $request->file('featured_photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('featured_photo')->move(public_path('uploads/books/'),$final_name);
            $obj->featured_photo = $final_name;
        }

        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->fullDescription = $request->fullDescription;
        $obj->price = $request->price;
        $obj->pages = $request->pages;
        $obj->published = $request->published;
        $obj->update();

        return redirect()->back()->with('success', 'Книга изменена.');
    }

    public function delete($id)
    {
        $single_data = Book::where('id',$id)->first();
     //   unlink(public_path('uploads/'.$single_data->featured_photo));
        $single_data->delete();
        return redirect()->back()->with('success', 'Книга удалена.');
    }


}
