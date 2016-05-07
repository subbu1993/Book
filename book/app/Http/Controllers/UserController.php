<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Book;
use Symfony\Component\HttpKernel\Exception;
class UserController extends Controller
{
    //

    public function library()
    {
      $user = Auth::user();
      $books = $user->books()->get();
      return view('user.library', ['books' => $books]);
    }
}
