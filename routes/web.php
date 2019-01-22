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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Post Routes Here
Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/posts/search','PostsController@find')->name('post.find');

Route::post('posts/new','PostsController@add')->name('post.add')
           ->middleware('validate_post');
Route::put('posts/{id}/update','PostsController@update')->name('post.update')
          ->middleware('validate_post');
Route::get('/posts/{id}/details/{title}', 
  'PostsController@view_details')
    ->name('post.details');

Route::middleware(['auth.basic'])->group(function(){
  Route::get('posts/{id}/edit','PostsController@edit')
  ->name('post.edit');
    Route::get('posts/{id}/delete', 'PostsController@delete')
    ->name('post.delete');
    Route::get('posts/post/', 'PostsController@new_post')
    ->name('posts.post');

    //comment routing map

    Route::post('post/{user_id}/{post_id}/comment',
   
      'CommentsController@store')->name('post.comment');


});
Route::get('profile','ProfileController@profile');
Route::post('profile/add','ProfileController@addProfile');

//Like routing map
Route::get('comment/{id}/like','LikesController@like')
       ->name('comment.like');
Route::get('comment/{id}/dislike','LikesController@dislike')
       ->name('comment.dislike');       


