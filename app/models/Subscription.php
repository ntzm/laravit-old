<?php

class Subscription extends Eloquent {

  protected $table   = 'subscriptions';
  public $timestamps = false;

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function sub()
  {
    return $this->belongsTo('Sub');
  }
}
