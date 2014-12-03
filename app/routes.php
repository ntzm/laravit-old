<?php

/**
 * General
 */

// Always use CSRF protection on POST requests
Route::when('*', 'csrf', array('post'));

// Voting
Route::post('vote', array(
  'before' => 'auth',
  'uses'   => 'VoteController@vote'
));

/**
 * Displaying users, subs and posts
 */

Route::get('u/{user}', 'UserController@show');
Route::get('r/{sub}', 'SubController@show');
Route::get('r/{sub}/comments/{postId}', 'PostController@show');

// Front page
Route::get('/', function()
{
  return View::make('sub')
    ->with('title', 'Front Page')
    ->with('posts', Post::paginate(15));
});

/**
 * User management
 */

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

// Checking the user is signed in (using AJAX)
Route::get('authcheck', function()
{
  return json_encode(Auth::check());
});

/**
 * Post management
 */

// Submitting a new post
Route::get('post/new', array(
  'before' => 'auth', function()
  {
    return View::make('forms.submit')
      ->with('title', 'New Post');
  }
));
Route::post('post/new', array(
  'before' => 'auth',
  'uses'   => 'PostController@create'
));

// Editing a post
Route::post('post/edit', array(
  'before' => 'auth',
  'uses'   => 'PostController@edit'
));

// Deleting a post
Route::post('post/delete', array(
  'before' => 'auth',
  'uses'   => 'PostController@delete'
));

/**
 * Sub management
 */

// Creating a new sub
Route::get('sub/new', array(
  'before' => 'auth', function()
  {
    return View::make('forms.createsub')
      ->with('title', 'Create Sub');
  }
));
Route::post('sub/new', array(
  'before' => 'auth',
  'uses'   => 'SubController@create'
));

// Editing a sub
Route::post('sub/edit', array(
  'before' => 'auth',
  'uses'   => 'SubController@edit'
));

// Deleting a sub
Route::post('sub/delete', array(
  'before' => 'auth',
  'uses'   => 'SubController@delete'
));
