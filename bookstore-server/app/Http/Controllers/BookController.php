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

    public function update()
    {
        $affected = DB::update('update books set price = ? where id = ?', [5000, 3]);

        return $affected;
    }

    public function delete()
    {
        $deleted = DB::delete('delete from books where id=?', [8]);

        return $deleted;
    }

}
