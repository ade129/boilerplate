<?php

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


Route::get('/', 'Frontend\HomeController@index');
// Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// users
Route::get('/users', 'UsersController@index')->name('profile');
Route::get('/users/create-new', 'UsersController@create_page')->name('create');

// tags
Route::get('/tags', 'TagsController@index')->name('index');
Route::get('/tags/create-new', 'TagsController@create_page')->name('create');
Route::post('/tags/create-new', 'TagsController@save_page')->name('create');
Route::get('/tags/update/{tag}', 'TagsController@update_page')->name('edit');

// Quotes
Route::get('/quotes', 'QuotesController@index')->name('index');
Route::get('/quotes/create-new', 'QuotesController@create_page')->name('create');
Route::post('/quotes/create-new', 'QuotesController@save_page')->name('create');
Route::get('/quotes/update/{quote}', 'QuotesController@update_page')->name('edit');
Route::post('/quotes/update/{quote}', 'QuotesController@update_save')->name('update');
Route::delete('/quotes/delete/{quote}', 'QuotesController@delete')->name('delete');
Route::get('/quotes/show/{slug}', 'QuotesController@show')->name('create');
Route::post('quotes/change-images/{quote}', 'QuotesController@change_image')->name('images');

// blogs frontend
Route::get('/blog', 'Frontend\BlogsController@index')->name('index');
Route::get('/blog/all/{tag_name}', 'Frontend\BlogsController@show')->name('show');
Route::get('/blog/detail/{slug}', 'Frontend\BlogsController@detail')->name('detail');

//comment frontend
Route::post('/blog/detail/{slug}','Frontend\CommentController@save_comment')->name('save_comment');
Route::get('/blog/detail/{slug}','Frontend\CommentController@show_comment')->name('show_comment');