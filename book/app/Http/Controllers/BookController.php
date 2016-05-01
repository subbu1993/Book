<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Author;
use App\Book;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

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

    public function welcome()
    {
      $all_books = Book::all();
      return view('welcome',['all_books' => $all_books]);
    }

    public function show($id)
    {
      $book = Book::find($id);
      $reviews = $book->reviews()->get();
      return view('book.show', ['book' => $book, 'reviews' => $reviews]);
    }

    public function read($id)
    {
      $filename = "uploads/books/7.pdf";
      $path = public_path($filename);
      return Response::make(file_get_contents($path), 200, [
          'Content-Type' => 'application/pdf',
          'Content-Disposition' => 'inline; filename="'.$filename.'"'
      ]);
    }
}
