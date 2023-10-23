<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayordermuslimPray extends Model
{
    use HasFactory;
    protected $table = 'prayordermuslim_prays';

    protected $fillable = [
        'prayordermuslim_id',
        'pray_id'
    ];
}
