<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Lang;
use App\Models\Publisher;
use App\Models\Religion;
use App\Models\ReviewRating;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request )
    {

    //    $books = Book::with('authors', 'genres','publishers','religions', 'langs' )->latest()->get();

    //    $avgStar = ReviewRating::where ('book_id',$id)->pluck('star_rating')->avg();
   //     $avgStar= round($avgStar);
        $reviewRating = ReviewRating::get();
        $langs = Lang::get();
        $religions = Religion::get();
        $genres = Genre::get();
        $publishers = Publisher::get();
        $queryBook= Book::query();

        if(isset($request->genres) && ($request->genres !=null))
        {
            $queryBook->whereHas('genres',function ($q) use ($request){
                $q->whereIn('genre_id',$request->genres);
            }) ;
        }
        if(isset($request->religions) && ($request->religions !=null))
        {
            $queryBook->whereHas('religions',function ($q) use ($request){
                $q->whereIn('religion_id',$request->religions);
            }) ;
        }

        if(isset($request->langs) && ($request->langs !=null))
        {
            $queryBook->whereHas('langs',function ($q) use ($request){
                $q->whereIn('lang_id',$request->langs);
            }) ;
        }
        if(isset($request->publishers) && ($request->publishers !=null))
        {
            $queryBook->whereHas('publishers',function ($q) use ($request){
                $q->whereIn('publisher_id',$request->publishers);
            }) ;
        }
        if(isset($request->priceMin) && ($request->priceMin !=null))
        {
            $queryBook->where('price','>=',$request->priceMin) ;
        }

        if(isset($request->priceMax) && ($request->priceMax !=null))
        {

            $queryBook->where('price','<=',$request->priceMax) ;
        }

        if(isset($request->publishedMin) && ($request->publishedMin !=null))
        {
            $queryBook->where('published','>=',$request->publishedMin) ;
        }

        if(isset($request->publishedMax) && ($request->publishedMax !=null))
        {

            $queryBook->where('published','<=',$request->publishedMax) ;
        }

        if(isset($request->title) && ($request->title !=null))
        {
            $queryBook->where('title',$request->title) ;
        }

        if(isset($request->authors) && ($request->authors !=null))
        {
            $queryBook->whereHas('authors',function ($q) use ($request){
                $q->whereIn('author_id',$request->authors);
            }) ;
        }


       $books = $queryBook->get();


        return view('front.books.book',compact('books','langs', 'religions','genres','publishers','reviewRating'));
    }

    public function single_book($id)
    {
        $avgStar = ReviewRating::where ('book_id',$id)->pluck('star_rating')->avg();
        $avgStar1= round($avgStar);
        $reviewCount = ReviewRating::where ('book_id',$id)->pluck('book_id')->count();
        $single_book_data = Book::with('authors', 'genres','publishers','religions', 'langs','ReviewData')->where('id',$id)->first();
        return view('front.books.book_detail', compact('single_book_data','avgStar','avgStar1','reviewCount'));
    }

    public function reviewstore(Request $request){
        $review = new ReviewRating();
        $review->book_id = $request->book_id;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->phone   = $request->phone;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        return redirect()->back();
    }

}
