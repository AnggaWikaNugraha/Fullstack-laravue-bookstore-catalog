<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    use HasFactory;

    protected $table = 'book_order';
    
    protected $fillable = [
        'book_id', 
        'order_id', 
        'quantity',
    ];
}
