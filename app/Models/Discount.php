<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'discounts';

    protected $fillable = [
        'name',
        'discount'
    ];

    public function excursions()
    {
        return $this->belongsToMany(Excursion::class);
    }

}
