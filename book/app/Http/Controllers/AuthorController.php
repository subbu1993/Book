<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Author;

class AuthorController extends Controller
{
    public function getAllAuthors()
    {
      $all_authors = Author::all()->pluck('name')->implode(',');
      return $all_authors;
    }
}
