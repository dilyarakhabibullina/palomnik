<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcursionWhatday extends Model
{
    use HasFactory;

    protected $table = 'excursion_whatday';

    protected $fillable = [
        'excursion_id',
        'whatday_id'
    ];
}
