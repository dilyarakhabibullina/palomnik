<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcursionDiscount extends Model
{
    use HasFactory;

    protected $table = 'excursion_discount';

    protected $fillable = [
        'excursion_id',
        'discount_id'
    ];
}
