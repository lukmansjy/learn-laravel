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

Route::get('/', 'HomeController');

Route::get('post', 'PostController@index');
Route::get('post/create', 'PostController@create');
Route::post('post/store', 'PostController@store');

Route::get('post/{post:slug}', 'PostController@show');
Route::get('post/{post:slug}/edit', 'PostController@edit');
Route::patch('post/{post:slug}/edit', 'PostController@update');
Route::delete('post/{post:slug}/delete', 'PostController@delete');

Route::get('category/{category:slug}', 'CategoryController@show');
Route::get('tag/{tag:slug}', 'TagController@show');

Route::get('contact', function(){
    return view('contact');
});

Route::get('about', function(){
    return view('about');
});

Route::get('login', function(){
    return view('login');
});