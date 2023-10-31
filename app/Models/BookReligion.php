<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReligion extends Model
{
    use HasFactory;
    protected $table = 'book_religion';

    protected $fillable = [
        'religion_id',
        'book_id'
    ];
}
