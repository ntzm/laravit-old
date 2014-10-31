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

// Displaying information
Route::get('u/{name}', 'UserController@showProfile');
Route::get('r/{name}', 'SubController@showSub');
Route::get('p/{id}', 'PostController@showPost');

// Signing in
Route::get('signin', function()
{
  return View::make('forms.signin')
    ->with('title', 'Sign In');
});
Route::post('signin', 'UserController@signInUser');

// Signing up
Route::get('signup', function()
{
  return View::make('forms.signup')
    ->with('title', 'Sign Up');
});
Route::post('signup', 'UserController@newUser');

// Signing out
Route::get('signout', 'UserController@signOutUser');

// Submitting a new post
Route::get('submit', array('before' => 'auth', function()
{
  return View::make('forms.submit')
    ->with('title', 'New Post');
}));
Route::post('submit', array(
  'before' => 'auth',
  'uses' => 'PostController@newPost'
));
