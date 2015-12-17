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
Route::get('/', function () {
    return view('welcome');
});

Route::get('session', function () {
	return Session::all();
});

//Authentication routes
Route::get('auth/login', ['as'=>'auth.login', 'uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as'=>'auth.login', 'uses'=>'Auth\AuthController@postLogin']);

Route::post('auth/logout', ['as'=>'auth.logout','uses'=>'Auth\AuthController@getLogout']);

//Registration routes
Route::get('auth/register', ['as'=>'auth.register', 'uses'=>'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as'=>'auth.register', 'uses'=>'Auth\AuthController@postRegister']);

Route::model('blogs', 'Blogs');
Route::model('posts', 'Posts');
Route::model('comment', 'Comment');

Route::bind('posts', function($value, $route){
	return NamBlog\Posts::whereSlug($value)->first();
});

Route::bind('blogs', function($value, $route) {
	return NamBlog\Blogs::whereSlug($value)->first();
});

Route::bind('comment', function($value, $route) {
	return NamBlog\Comment::whereId($value)->first();
});

Route::get('blogs/{blogs}/{posts}', ['as'=>'blogs.posts.view', 'uses'=>'BlogsController@view']);

Route::get('blogs/{blogs}/dashboard', ['as'=>'blogs.manage', 'uses'=>'BlogsController@manage']);
Route::resource('blogs', 'BlogsController');

Route::resource('blogs.posts', 
				'PostsController', 
				[
					'except'=>['edit', 'index']
				]);
				
Route::get('blogs/{blogs}/dashboard/comments/{comment}', ['as'=>'comment.edit', 'uses'=>'CommentsController@edit']);
Route::put('blogs/{blogs}/dashboard/comments/{comment}', ['as'=>'comment.update', 'uses'=>'CommentsController@update']);
Route::delete('blogs/{blogs}/dashboard/comments/{comment}', ['as'=>'comment.destroy', 'uses'=>'CommentsController@destroy']);
Route::post('blogs/{blogs}/dashboard/comments', ['as'=>'comment.create', 'uses'=>'CommentsController@create']);





