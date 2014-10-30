<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
  return View::make('default')
    ->with('title', 'Front Page');
});

Route::get('u/{id}', 'UserController@showProfile');

Route::get('r/{id}', 'SubController@showSub');

Route::get('p/{id}', 'PostController@showPost');

Route::get('signin', function()
{
  return View::make('forms.signin')
    ->with('title', 'Sign In');
});

Route::get('signup', function()
{
  return View::make('forms.signup')
    ->with('title', 'Sign Up');
});

Route::post('signup', 'UserController@signup');

Route::get('submit', function()
{
  return View::make('forms.submit')
    ->with('title', 'New Post');
});

Route::post('submit', 'PostController@new');
