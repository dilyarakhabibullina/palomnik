<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'fullDescription',
        'price',
        'featured_photo	',
        'pages',
        'published',

    ];

    protected $perPage = 25;


    public function authors()
    {
        return $this->belongsToMany(Author::class,'book_author','book_id','author_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class,'book_genre','book_id','genre_id');
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class,'book_publisher','book_id','publisher_id');
    }

    public function religions()
    {
        return $this->belongsToMany(Religion::class,'book_religion','book_id','religion_id');
    }

    public function langs()
    {
        return $this->belongsToMany(Lang::class,'book_lang','book_id','lang_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->latest('created_at');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsNewAttribute()
    {
        return now()->subDays(7) <= $this->created_at;
    }

    public function getPriceWithDiscount()
    {
        $discount_percent = $this->discount;
        $discount = ($this->price / 100 * $discount_percent);
        $final_sum = ($this->price - $discount);

        return $final_sum;
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }

    public function getAverageBookRating()
    {
        return $this->reviews->avg('stars');
    }

    public function ReviewData()
    {
        return $this->hasMany('App\Models\ReviewRating','book_id');
    }

}
