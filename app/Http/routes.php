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
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::model('blogs', 'Blogs');
Route::model('posts', 'Posts');

Route::bind('posts', function($value, $route){
	return NamBlog\Posts::whereSlug($value)->first();
});

Route::bind('blogs', function($value, $route) {
	return NamBlog\Blogs::whereSlug($value)->first();
});
Route::get('blogs/{blogs}/dashboard', ['as'=>'blogs.manage', 'uses'=>'BlogsController@manage']);
Route::resource('blogs', 'BlogsController', ['middleware'=>'']);

Route::resource('blogs.posts', 
				'PostsController', 
				[
					'middleware'=>'auth', 
					'except'=>['edit']
				
				]);
				
Route::get('blogs/{blogs}/dashboard/comments', ['as'=>'blogs.comments', 'uses'=>'CommentsController@all']);