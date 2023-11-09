<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcursionPlacevisit extends Model
{
    use HasFactory;
    protected $table = 'excursion_placevisit';

    protected $fillable = [
        'excursion_id',
        'placevisit_id'
    ];
}
