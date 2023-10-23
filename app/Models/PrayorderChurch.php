<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayorderChurch extends Model
{
    use HasFactory;
    protected $table = 'prayorder_church';

    protected $fillable = [
        'prayorder_id',
        'church_id'
    ];
}
