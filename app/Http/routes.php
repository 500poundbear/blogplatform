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

Route::model('blogs', 'Blog');

Route::bind('blogs', function($value, $route) {
	return App\Blog::whereSlug($value)->first();
});

Route::resource('blogs', 'BlogsController');