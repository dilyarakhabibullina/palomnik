<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayordermuslim extends Model
{
    use HasFactory;

    public function mosques()
    {
        return $this->belongsToMany(Mosque::class,'prayordermuslim_mosque','prayordermuslim_id','mosque_id');
    }
    public function muslimprays()
    {
        return $this->belongsToMany(Pray::class,'prayordermuslim_pray','prayordermuslim_id','pray_id');
    }
}
