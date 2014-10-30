<?php

class UserController extends BaseController {

  public function showProfile($id)
  {
    $user = User::find($id);

    // Validation here

    return View::make('profile')
      ->with('title', $user->name);
  }

  public function login($name, $password, $remember)
  {
    $remember = is_bool($remember) ? $remember : false;

    if(Auth::attempt(
      array(
        'name' => $name,
        'password' => $password
      ), $remember)
    ) {
      return Redirect::intended('/');
    } else {
      return Redirect::to('login')->with('message', 'Logn Failed');
    }
  }

  public function register()
  {
    $name = Input::get('username');
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
      return Redirect::to('register')->with('messages', $validator->messages());
    } else {
      $hash = Hash::make($password);

      User::create(array('name' => $name, 'password' => $hash));
    }
  }

}
