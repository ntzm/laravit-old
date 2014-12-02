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

// Always use CSRF protection on POST requests
Route::when('*', 'csrf', array('post'));

// Front page
Route::get('/', function()
{
  return View::make('sub')
    ->with('title', 'Front Page')
    ->with('posts', Post::paginate(15));
});

// Displaying information
Route::get('u/{user}', 'UserController@show');
Route::get('r/{sub}', 'SubController@show');
Route::get('r/{sub}/comments/{postId}', 'PostController@show');

// Signing in
Route::get('signin', function()
{
  return View::make('forms.signin')
    ->with('title', 'Sign In');
});
Route::post('signin', 'UserController@signIn');

// Signing up
Route::get('signup', function()
{
  return View::make('forms.signup')
    ->with('title', 'Sign Up');
});
Route::post('signup', 'UserController@signUp');

// Signing out
Route::get('signout', 'UserController@signOut');

// Submitting a new post
Route::get('submit', array('before' => 'auth', function()
{
  return View::make('forms.submit')
    ->with('title', 'New Post');
}));
Route::post('submit', array(
  'before' => 'auth',
  'uses'   => 'PostController@create'
));

// Creating a new sub
Route::get('createsub', array('before' => 'auth', function()
{
  return View::make('forms.createsub')
    ->with('title', 'Create Sub');
}));
Route::post('createsub', array(
  'before' => 'auth',
  'uses'   => 'SubController@create'
));

// Voting
Route::post('vote', 'VoteController@vote');
