<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderexcurdetails()
    {
        return $this->hasMany(OrderexcurDetail::class);
    }
    public function orderbookdetails()
    {
        return $this->hasMany(OrderbookDetail::class);
    }
    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
