<?php

class UserController extends BaseController {

  public function showProfile($id)
  {
    $user = User::find($id);

    // Use findorfail here

    return View::make('profile')
      ->with('title', $user->name);
  }

  public function signInUser()
  {
    $name     = Input::get('name');
    $password = Input::get('password');
    $remember = Input::get('remember');

    $remember = is_bool($remember) ? $remember : false;

    if (Auth::attempt(
      array(
        'name'     => $name,
        'password' => $password
      ), $remember)
    ) {
      return Redirect::to('/');

    } else {
      Input::flash();

      return Redirect::to('signin')
        ->with('error', 'Authentication Failed');
    }
  }

  public function signOutUser()
  {
    Auth::logout();
    return Redirect::to('/');
  }

  public function newUser()
  {
    $name = Input::get('name');
    $password = Input::get('password');

    $validator = Validator::make(
      array(
        'name' => $name,
        'password' => $password
      ),
      array(
        'name' => 'required|min:3|unique:users',
        'password' => 'required|min:8'
      )
    );

    if ($validator->fails()) {
      return Redirect::to('signup')
        ->withErrors($validator);

    } else {
      $hash = Hash::make($password);

      User::create(array('name' => $name, 'password' => $hash));

      return Redirect::to('/');
    }
  }

}
