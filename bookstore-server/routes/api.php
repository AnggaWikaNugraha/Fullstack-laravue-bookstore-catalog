<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('nama', function () {
    return 'Namaku, Larashop API';
});
   

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['throttle:10,1'])->group(function () {
   
    Route::middleware(['cors'])->group(function () {
        Route::get('buku/{judul}', [App\Http\Controllers\BookController::class, 'cetak']);
    });

});
   
Route::get('category/{id}', function ($id) {
    
    $categories = [
        1 => 'Programming',
        2 => 'Desain Grafis',
        3 => 'Jaringan Komputer',
    ];
    $id = (int) $id;

    if($id==0) return 'Silakan pilih kategori';
    else return 'Anda memilih kategori '.$categories[$id];

});

Route::get('book/{id}', function () {
    return 'buku angka';
})->where('id', '[0-9]+')->name('book');

Route::get('book/{title}', function ($title) {
    return 'buku abjad';
})->where('title', '[A-Za-z]+');

Route::prefix('v1')->group(function () {
    Route::get('books', function () {
        return 'books';
    });
    Route::get('categories', function () {
        return 'categories';
    });
});

Route::domain('{category}.larashop.id')->group(function () {
    Route::get('book/{id}', function ($category, $id) {
        return 'buku angka';
    });
});

// callback controller
Route::get('buku/{judul}',[App\Http\Controllers\BookController::class, 'cetak'] );
   