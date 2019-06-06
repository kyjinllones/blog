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
    Route::get('posts/{id}/restore/','PostsController@restore')
    ->name('post.restore');
    //comment routing map

    Route::post('post/{user_id}/{post_id}/comment',
       'CommentsController@store')->name('post.comment');
});

Route::get('comment/{id}/like','LikesController@like')
       ->name('comment.like');
Route::get('comment/{id}/dislike','LikesController@dislike')
       ->name('comment.dislike');  
Route::get('profile/{user_id}/view','ProfileController@index') 
       ->name('profile');
Route::post('profile/update','ProfileController@update')
       ->name('profile.edit');
Route::get('profile/friend', 'ProfileController@view_friend');
Route::get('/profile/friend-cookie', 'ProfileController@get_cookie_friend');

Route::prefix('photos')->group(function(){
  Route::post('upload','PhotoController@upload')
       ->name('photo.upload');
  Route::get('{user_id}/{id}/delete', 'PhotoController@delete')
       ->name('photo.delete');

  Route::post('{user_id}/{id}/change', 'PhotoController@change')
       ->name('photo.change');
});
