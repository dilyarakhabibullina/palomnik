<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;

    protected $table = 'durations';

    protected $fillable = [
        'start',

    ];

    public function excursions()
    {
        return $this->belongsToMany(Excursion::class);
    }
}
