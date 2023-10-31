<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPublisher extends Model
{
    use HasFactory;

    protected $table = 'book_publisher';

    protected $fillable = [
        'publisher_id',
        'book_id'
    ];
}
