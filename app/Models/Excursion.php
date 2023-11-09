<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'name',
        'description',
        'fullDescription',
        'price',
        'featured_photo	',
        'placeMeeting',
        'durationExcursion',
        'startDateExcursion',
        'finishDateExcursion',
        'guide',
        'transport'
    ];

    public function durations()
    {
        return $this->belongsToMany(Duration::class,'excursion_duration','excursion_id','duration_id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class,'excursion_discount','excursion_id','discount_id');
    }

    public function photos()
    {
        return $this->hasMany(ExcursionEphoto::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function ReviewexcurData()
    {
        return $this->hasMany('App\Models\ReviewexcurRating','excursion_id');
    }

    public function whatdays()
    {
        return $this->belongsToMany(Whatday::class,'excursion_whatday','excursion_id','whatday_id');
    }

    public function placevisits()
    {
        return $this->belongsToMany(Placevisit::class,'excursion_placevisit','excursion_id','placevisit_id');
    }


}



