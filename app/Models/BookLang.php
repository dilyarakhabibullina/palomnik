<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLang extends Model
{
    use HasFactory;

    protected $table = 'book_lang';

    protected $fillable = [
        'book_id',
        'lang_id'
    ];
}
