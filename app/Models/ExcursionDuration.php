<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcursionDuration extends Model
{
    use HasFactory;
    protected $table = 'excursion_duration';

    protected $fillable = [
        'excursion_id',
        'duration_id'
    ];
}
