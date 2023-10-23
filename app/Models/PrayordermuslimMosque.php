<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayordermuslimMosque extends Model
{
    use HasFactory;
    protected $table = 'prayordermuslim_mosque';

    protected $fillable = [
        'prayordermuslim_id',
        'mosque_id'
    ];
}
