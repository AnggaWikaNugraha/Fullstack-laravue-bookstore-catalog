<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function cetak($judul)
    {
        return $judul;
    }

    public function index()
    {
        $books = DB::select('select * from books');
        
        return $books;
    }

    public function view($id)
    {
        $book = DB::select('select * from books where id = ?', [ $id ]);
        
        return $book;
    }

    public function insert()
    {
        return DB::insert('insert into books (title, slug) values (?, ?)', ['Learn AngularJS', 'learn-angulartjs']);;
    }

}
