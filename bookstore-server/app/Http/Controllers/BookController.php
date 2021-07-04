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
        // raw query
        // $books = DB::select('select * from books');

        // query builder
        // $books = DB::table('books')->get();

        // mereturn collection data
        // select id, title from books
        // $books = DB::table('books')->pluck('id', 'title');
        // foreach ($books as $id => $title) {
        //     echo $title;
        // }

        // eloquint
        $books = \App\Models\Book::all();
        // foreach ($books as $book) {
        //     echo $book->title;
        // }

        // $books = \App\Models\Book::where('status', 'PUBLISH')
        //     ->orderBy('title', 'asc')
        //     ->limit(10)
        //     ->get();

        // jangan ambil buku yang statusnya draft (REJECT)
        // $published_books = $books->reject(function ($book) {
        //     return $book->status=='DRAFT';
        // });

        // ambil buku yang statusnya publish
        // $published_books = $books->filter(function ($book) {
        //     return $book->status=='PUBLISH';
        // });

        // ambil 2 items buku secara random
        // return $books->random(2)->all();
        
        return $books;
    }

    public function view($id)
    {
        // raw query
        $book = DB::select('select * from books where id = ?', [ $id ]);

        // query builder
        // $book = DB::table('books')->where('id', $id)->first();
        
        return $book;
    }

    public function insert()
    {
        // raw query
        // $book = DB::insert('insert into books (title, slug) values (?, ?)', ['Learn CJS', 'learn-cjs']);

         // query builder
        $book = DB::table('books')->insert(
            ['title' => 'Learn DJS', 'slug' => 'learn-djs']
        );

        return $book;
    }

    public function update()
    {
        // raw query
        // $affected = DB::update('update books set price = ? where id = ?', [5000, 3]);

         // query builder
        $affected = DB::table('books')
                                ->where('id', 3)
                                ->update(['price' => 8000]);

        return $affected;
    }

    public function delete()
    {
        // raw query
        // $deleted = DB::delete('delete from books where id=?', [8]);

        // query builder
        $deleted = DB::table('books')->where('id', '=', 14)->delete();

        return $deleted;
    }

}
