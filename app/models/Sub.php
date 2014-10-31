<?php

class Sub extends Eloquent {

  protected $table    = 'subs';
  protected $fillable = array('name', 'owner_id');

  public function posts()
  {
    return $this->hasMany('Post');
  }

  public function owner()
  {
    return $this->belongsTo('User');
  }

  public function subscriptions()
  {
    return $this->hasMany('Subscription');
  }
}
