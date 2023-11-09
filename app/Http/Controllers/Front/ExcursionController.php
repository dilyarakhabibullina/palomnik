<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Excursion;
use App\Models\Placevisit;
use App\Models\ReviewexcurRating;
use App\Models\Whatday;
use Illuminate\Http\Request;

class ExcursionController extends Controller
{
    public function index(Request $request)
    {
          $placevisits= Placevisit::get();
          $discounts = Discount::get();
          $whatdays = Whatday::get();
        $queryExcursion= Excursion::query();

        if(isset($request->whatdays) && ($request->whatdays !=null))
        {
            $queryExcursion->whereHas('whatdays',function ($q) use ($request){
                $q->whereIn('whatday_id',$request->whatdays);
            }) ;
        }
        if(isset($request->placevisits) && ($request->placevisits !=null))
        {
            $queryExcursion->whereHas('placevisits',function ($q) use ($request){
                $q->whereIn('placevisit_id',$request->placevisits);
            }) ;
        }


        if(isset($request->priceMin) && ($request->priceMin !=null))
        {
            $queryExcursion->where('price','>=',$request->priceMin) ;
        }

        if(isset($request->priceMax) && ($request->priceMax !=null))
        {

            $queryExcursion->where('price','<=',$request->priceMax) ;
        }

        if(isset($request->durationExcursiondMin) && ($request->durationExcursiondMin !=null))
        {
            $queryExcursion->where('durationExcursion','>=',$request->durationExcursiondMin) ;
        }

        if(isset($request->durationExcursionMax) && ($request->durationExcursionMax !=null))
        {

            $queryExcursion->where('durationExcursion','<=',$request->durationExcursionMax) ;
        }

        if(isset($request->name) && ($request->name !=null))
        {
            $queryExcursion->where('name',$request->name) ;
        }



        $excursions = $queryExcursion->get();

        return view('front.excursions.excursion',compact('excursions','discounts','whatdays','placevisits'));
    }

    public function single_excursion($id)
    {
        $avgStar = ReviewexcurRating::where('excursion_id', $id)->pluck('star_rating')->avg();
        $avgStar1 = round($avgStar);
        $reviewCount = ReviewexcurRating::where('excursion_id', $id)->pluck('excursion_id')->count();
        $single_excursion_data = Excursion::with('discounts', 'durations')->where('id', $id)->first();



        $c_daysOfWeekDisabled = array('0','1','2','3','4','5','6','7');
        foreach ($single_excursion_data->whatdays as $whatday) {
        if($whatday->whatday == 0){$c_daysOfWeekDisabled = array ('0');}
        else {  unset($c_daysOfWeekDisabled[$whatday->whatday]);
}
          $calinder_daysOfWeekHighlighted[] = $whatday->whatday;
        }
        $c_daysOfWeekDisabled = implode(',',$c_daysOfWeekDisabled);
       $c_daysOfWeekHighlighted  = implode(',', $calinder_daysOfWeekHighlighted);

        $c_startDate = date('d.m.Y', strtotime($single_excursion_data->startDateExcursion));
        $c_finishDate = date('d.m.Y', strtotime($single_excursion_data->finishDateExcursion));


        return view('front.excursions.excursion_detail', compact('single_excursion_data','avgStar','avgStar1','reviewCount','c_daysOfWeekHighlighted','c_daysOfWeekDisabled','c_finishDate','c_startDate'));
    }

    public function reviewexcurstore(Request $request){
        $review = new ReviewexcurRating();
        $review->excursion_id = $request->excursion_id;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->phone   = $request->phone;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        return redirect()->back()->with('flash_msg_success','Ваш отзыв был опубликован,');
    }
}
