<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/{id}', 'PagesController@viewCategory')->name('category');

Route::group(['prefix' => 'admin', 'middleware' => 'roles' , 'roles' => ['admin', 'librarian']] , function (){
    Route::get('/users/{id}', 'AdminUsersController@change');
    Route::get('/users/accept/{id}', 'AdminUsersController@accept');
    Route::post('/users/{id}/role', 'AdminUsersController@updateRole');
    Route::resource('/users' , 'AdminUsersController');
    Route::resource('/authors' , 'AdminAuthorController');
    Route::resource('/categories' , 'AdminCategoriesController');
    Route::resource('/books' , 'AdminBooksController');
    Route::resource('/profile' , 'AccountsController');
    Route::get('/requests', 'RequestsController@index');
    Route::get('/requests/accepted', 'RequestsController@accepted');
    Route::get('/requests/rejected', 'RequestsController@rejected');
    Route::get('/requests/{id}/accept', 'RequestsController@accept');
    Route::get('/requests/{id}/reject', 'RequestsController@reject');
});


Route::get('/book/{id}', 'BookController@show');

Route::get('/search/{type}', 'SearchController@index');
Route::get('/result', 'SearchController@result');
Route::get('/search/make/browse', 'SearchController@browse');
Route::get('/search/make/advanced', 'SearchController@advanced');
Route::get('/search/make/keyword', 'SearchController@keyword');
Route::get('/contactus', function (){
    return view('contactus');
});
Route::get('/ask', function (){
    return view('ask');
});
Route::get('/about', function (){
    return view('about');
});

Route::group(['middleware' => 'auth'], function (){
    Route::post('/book/{id}/request', 'RequestsController@make');
    Route::get('/bookshelves', 'RequestsController@mybooks');
    Route::get('/saved', 'BookController@saved');
    Route::get('/account' , 'AccountsController@edituser');
    Route::get('/book/{id}/save', 'BookController@save');
});
