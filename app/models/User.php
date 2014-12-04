<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class User extends Elegant implements UserInterface {

	use UserTrait;

	protected $table    = 'users';
	protected $hidden   = array('password', 'remember_token');
  protected $fillable = array('name', 'password');

  protected $rules = array(
    'name'     => 'required|min:3|max:20|alpha_dash|unique:users',
    'password' => 'required|min:6'
  );

  /**
   * Relationships
   */

  public function posts()
  {
    return $this->hasMany('Post');
  }

  public function subs()
  {
    return $this->hasMany('Sub');
  }

  public function comments()
  {
    return $this->hasMany('Comment');
  }

  public function postvotes()
  {
    return $this->hasMany('PostVote');
  }

  public function cmtvotes()
  {
    return $this->hasMany('CmtVote');
  }

  public function subcriptions()
  {
    return $this->hasMany('Subscription');
  }
}
