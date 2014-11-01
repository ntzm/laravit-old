<?php

class UserController extends BaseController {

  /**
   * Show the user profile
   * @param  string $name
   * @return view
   */
  public function showProfile($name)
  {
    $user = User::where('name', $name)->firstOrFail();

    return View::make('profile')
      ->with('title', $user->name)
      ->with('posts', $user->posts()->paginate(15));
  }

  /**
   * Attempt to sign in the user
   * @return redirect
   */
  public function signInUser()
  {
    $remember = Input::get('remember');
    $remember = is_bool($remember) ? $remember : false;

    if (Auth::attempt(array(
      'name'     => Input::get('name'),
      'password' => Input::get('password')
    ), $remember)) {
      return Redirect::intended('/');

    } else {
      Input::flash();

      return Redirect::to('signin')
        ->with('error', 'Authentication Failed');
    }
  }

  /**
   * Sign out the user
   * @return redirect
   */
  public function signOutUser()
  {
    Auth::logout();
    return Redirect::to('/');
  }

  /**
   * Create a new user
   * @return redirect
   */
  public function newUser()
  {
    $rules = array(
      'name'     => 'required|min:3|max:20|unique:users',
      'password' => 'required|min:8'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      return Redirect::to('signup')
        ->withErrors($validator);

    } else {
      $hash = Hash::make(Input::get('password'));

      User::create(array(
        'name'     => Input::get('name'),
        'password' => $hash
      ));

      return Redirect::to('/');
    }
  }
}
