<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use App\UserRead;
use DB;

class GenreController extends Controller
{
    //
    public function listBooks($genre_name)
    {

      $all_books = Book::where('genre','=',$genre_name)->get();
      $ids_of_genre_books = $all_books->pluck('id');
      $top_read_ids = UserRead::whereIn('book_id',$ids_of_genre_books)->select('book_id',DB::raw('count(*) as total'))->groupBy('book_id')->lists('book_id')->take(4)->reverse();
      if($top_read_ids->count() > 0)
      {
        $placeholders = implode(',',array_fill(0, count($top_read_ids), '?'));
        $top_read_books = Book::whereIn('id',$top_read_ids)->orderByRaw("field(id,{$placeholders})", $top_read_ids)->get();
      }
      else {
        $top_read_books = new \Illuminate\Database\Eloquent\Collection;
      }
      $new_arrivals = Book::where('genre','=',$genre_name)->orderBy('created_at','desc')->limit(8)->get();
      return view('genre.list',['top_read_books' => $top_read_books, 'new_arrivals' => $new_arrivals, 'all_books' => $all_books]);
    }
}
