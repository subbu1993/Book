<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','BookController@welcome');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/library', 'UserController@library');

Route::post('/addBook', 'BookController@addBook');

Route::get('/authors/all', 'AuthorController@getAllAuthors');

Route::get('/books/all','BookController@getBookNames');

Route::get('books/show/{id}', 'BookController@show');

Route::get('/books/read/{id}','BookController@read');

Route::resource('review', 'ReviewController');

Route::get('/books/done/{id}','BookController@done');

Route::get('/books/newArrivals','BookController@newArrivals');
