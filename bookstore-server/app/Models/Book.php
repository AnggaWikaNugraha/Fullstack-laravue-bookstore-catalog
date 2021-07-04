<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // protected $table = 'books';

    // primary key berupa string harus di false increment karena laravel menganggap integer dan increment
    // protected $primaryKey = 'slug'; // string
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
        'title', 
        'slug', 
        'description', 
        'author', 
        'publisher',
        'cover', 
        'price', 
        'weight', 
        'stock', 
        'status'
        ];

}
