<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayorderTreb extends Model
{
    use HasFactory;
    protected $table = 'prayorder_treb';

    protected $fillable = [
        'prayorder_id',
        'treb_id'
    ];
}
