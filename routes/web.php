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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'PostsController@post');

Route::get('/category', 'CategoriesController@category');

Route::post('/addcat', 'CategoriesController@addcat');

Route::post('/addpost', 'PostsController@addpost');

Route::get('/personal', 'PostsController@personal');

Route::get('/category/{id}', 'PostsController@category');

Route::get('/personal/{id}', 'PostsController@personal');

// Route::get('/post/{id}', 'PostsController@post');

Route::get('/usersPosts', 'PostsController@usersPosts');

Route::get('/region', 'RegionsController@region');

Route::post('/addregion', 'RegionsController@addregion');

Route::get('/region/{id}', 'PostsController@region');

Route::get('/edit/{id}', 'PostsController@edit');

Route::get('/like/{id}', 'PostsController@like');

Route::get('/dislike/{id}', 'PostsController@dislike');

Route::post('/comment/{id}', 'PostsController@comment');

Route::get('/usersPosts', 'PostsController@usersPosts');

Route::post('/search', 'PostsController@search');

// Route::get('post/{id}', 'PostsController@showProfile');

// Route::get('likes/{id}', function ($id) {
    
//     $game = Like::find($id);
    
//     return view('likes.show', ['game' => $game]);
// });