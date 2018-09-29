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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('welcome');
//     return '<h1>Hello World</h1>';
// });
// Route::get('/users/{id}/{name}', function($id, $name){
//   return 'This is user ' .$name.'with an id of '.$id;
// });

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('posts', 'PostsController');
Route::post('/posts/store', 'PostsController@store');
Route::get('/photos/create/{id}', 'PhotosController@create');
Route::post('/photos/store', 'PhotosController@store');

Route::get('/photos/show/{id}', 'PhotosController@show');
Route::delete('/photos/{id}', 'PhotosController@destroy');


Route::get('/posts/login','PostsController@login');


// Two Factor Authentication
// Route::get('2fa', 'TwoFactorController@showTwoFactorForm');
// Route::post('2fa', 'TwoFactorController@verifyTwoFactor');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


