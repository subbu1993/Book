<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Author;
use Symfony\Component\HttpKernel\Exception;
use App\Book;
use App\UserRead;
use DB;
class AuthorController extends Controller
{
    public function getAllAuthors()
    {
      $all_authors = Author::all()->pluck('name')->implode(',');
      return $all_authors;
    }

    public function list($id)
    {
      $author = Author::find($id);
      $all_books = Book::where('author_id',$id)->get();
      $new_arrivals = Book::where('author_id', $id)->orderBy('created_at','desc')->limit(8)->get();
      $ids_of_author_books = $all_books->pluck('id');
      $top_read_ids = UserRead::whereIn('book_id',$ids_of_author_books)->select('book_id',DB::raw('count(*) as total'))->groupBy('book_id')->lists('book_id')->take(4)->reverse();
      if($top_read_ids->count() > 0)
      {
        $placeholders = implode(',',array_fill(0, count($top_read_ids), '?'));
        $top_read_books = Book::whereIn('id',$top_read_ids)->orderByRaw("field(id,{$placeholders})", $top_read_ids)->get();
      }
      else {
        $top_read_books = new \Illuminate\Database\Eloquent\Collection;
      }
      return view('authors.list',['all_books' => $all_books, 'top_read_books' => $top_read_books, 'new_arrivals' => $new_arrivals]);
    }
}
