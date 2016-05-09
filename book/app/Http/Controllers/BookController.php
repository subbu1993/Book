<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Author;
use App\Book;
use App\UserRead;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use View;
use Symfony\Component\HttpKernel\Exception;

class BookController extends Controller
{
    //
    private function findAuthor($author)
    {
      $existing_author = Author::where('name','=',$author);
      if($existing_author->count() > 0)
      {
        return $existing_author->first()->id;
      }
      else
      {
        $new_author = new Author;
        $new_author->name = $author;
        $new_author->save();
        return $new_author->id;
      }
    }

    private function findBook($book)
    {
      $existing_book = Book::where('name','=',$book);
      if($existing_book->count() > 0)
      {
        return $existing_book->first()->id;
      }
      else
      {
        return null;
      }
    }
    public function addBook(Request $request)
    {
      $author = $request->author_name;
      $book = $request->book_name;
      $authorID = $this->findAuthor($author);
      $bookID = $this->findBook($book);
      $user = Auth::user();
      if($bookID == null)
      {
        $book = new Book;
        $book->name = $request->book_name;
        $book->author_id = $authorID;
        $book->genre = $request->genre;
        $book->description = $request->description;
        $file = array('cover_pic' => $request->file('cover_pic'));
        $rules = array('cover_pic' => 'required');
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
          return redirect('/library')->withInput()->withErrors($validator);
        }
        else {
          $file = $request->file('cover_pic');
          if ($file->isValid()) {
             $destinationPath = 'uploads/cover_pics';
             $extension = $file->getClientOriginalExtension();
             if(Book::count() == 0)
              $lastBookID = 1;
             else
              $lastBookID = Book::latest()->first()->id;
             $fileName = ($lastBookID + 1).'.'.$extension;
             $file->move($destinationPath, $fileName);
           }
           else {
             return Redirect::to('upload');
           }
        }
        $book_file = $request->file('ebook');
        if($book_file->isValid())
        {
          $path = "uploads/books";
          $extension = $book_file->getClientOriginalExtension();
          $fileName = ($lastBookID + 1).'.'.$extension;
          $book_file->move($path,$fileName);
        }
        $book->save();
      }
      else {
        $book = Book::find($bookID);
      }
      $book->users()->attach($user);
      return redirect('/library');
    }
    public function getBookNames()
    {
      $names = Book::all()->pluck('name')->implode(',');
      return $names;
    }
    public function retrieveBook(Request $request)
    {
        $book=$request->book_name;
        $id=$this->findBook($book);
        return redirect("/books/show/$id");
    }

    public function welcome(Request $request)
    {
      if (Auth::guest())
        return view('welcome');
      else
      {
        $user = Auth::user();
        $current_books = UserRead::where('user_id',$user->id)->where('status','reading')->pluck('book_id');
        $reading_books = Book::whereIn('id',$current_books)->get();
        $new_arrivals = Book::orderBy('created_at','desc')->limit(8)->get();
        $all_books = Book::all();
        $view = View::make('welcome',['reading' => $reading_books, 'new_arrivals' => $new_arrivals, 'all_books' => $all_books]);

        if($request->ajax())
        {
          $sections = $view->renderSections();
          return $sections['content'];
        }

        return $view;
      }

    }

    public function show($id)
    {
      $book = Book::find($id);
      $reviews = $book->reviews()->get();
      if($book->review_sum != 0)
        $rating = $book->review_sum/$book->review_count;
      else
        $rating = 0;
      return view('book.show', ['book' => $book,'rating' => $rating, 'reviews' => $reviews]);
    }

    public function read($id)
    {
      $user = Auth::user();
      $user_read = UserRead::firstOrCreate(['user_id' => $user->id, 'book_id' => $id, 'status'=> "reading"]);
      $filename = "uploads/books/$id.pdf";
      if(file_exists(public_path($filename)))
        $path = public_path($filename);
      else {
          $path = public_path("uploads/books/default.pdf");
      }
      return Response::make(file_get_contents($path), 200, [
          'Content-Type' => 'application/pdf',
          'Content-Disposition' => 'inline; filename="'.$filename.'"'
      ]);
    }

    public function done($id)
    {
      $user = Auth::user();
      $user_read = UserRead::where('user_id', $user->id)->where('book_id', $id)->update(['status' => "done"]);
      return redirect("/books/show/$id");
    }

    public function newArrivals()
    {
      $user = Auth::user();
      $current_books = UserRead::where('user_id',$user->id)->where('status','reading')->pluck('book_id');
      $reading_books = Book::where('id',$current_books);
      $new_arrivals = Book::orderBy('created_at','desc')->limit(8)->get();
      $all_books = Book::all();
      return view('welcome',['reading' => $reading_books, 'new_arrivals' => $new_arrivals, 'all_books' => $all_books]);
    }
}
