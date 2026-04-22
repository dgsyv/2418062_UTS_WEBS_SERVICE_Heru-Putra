<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{

    protected $table = 'books';
    protected $fillable = [
    'title',
    'author',
    'year',
    'stock'
];

}
