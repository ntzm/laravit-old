<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	use UserTrait;

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

  protected $fillable = array('name', 'password');

}
