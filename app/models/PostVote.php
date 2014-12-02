<?php

class PostVote extends Eloquent {

  protected $table   = 'postvotes';
  public $timestamps = false;
  protected $fillable = array('type', 'user_id', 'post_id');

  public function post()
  {
    return $this->belongsTo('Post');
  }

  public function user()
  {
    return $this->belongsTo('User');
  }
}
