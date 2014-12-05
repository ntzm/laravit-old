<?php

class UserController extends BaseController {

  /**
   * Show the user profile
   * @param  string $name
   * @return view
   */
  public function show($name)
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
  public function signIn()
  {
    $remember = Input::get('remember');
    $remember = is_bool($remember) ? $remember : false;

    $signIn = Auth::attempt(array(
      'name'     => Input::get('name'),
      'password' => Input::get('password')
    ), $remember);

    if ($signIn)
    {
      return Redirect::intended('/');
    }
    else
    {
      Input::flash();

      return Redirect::to('signin')
        ->with('error', 'Authentication Failed');
    }
  }

  /**
   * Sign out the user
   * @return redirect
   */
  public function signOut()
  {
    Auth::logout();
    return Redirect::to('/');
  }

  /**
   * Create a new user
   * @return redirect
   */
  public function signUp()
  {
    $user = new User;

    if ($user->validate(Input::all()))
    {
      $hash = Hash::make(Input::get('password'));

      User::create(array(
        'name'     => Input::get('name'),
        'password' => $hash
      ));

      return Redirect::to('/');
    }
    else
    {
      return Redirect::to('signup')
        ->withErrors($user->messages());
    }
  }
}
