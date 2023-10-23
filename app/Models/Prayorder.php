<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayorder extends Model
{
    use HasFactory;

    public function churches()
    {
        return $this->belongsToMany(Church::class,'prayorder_church','prayorder_id','church_id');
    }
    public function trebs()
    {
        return $this->belongsToMany(Treb::class,'prayorder_treb','prayorder_id','treb_id');
    }
}
