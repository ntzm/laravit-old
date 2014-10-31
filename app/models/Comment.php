<?php

class Comment extends Eloquent {

  protected $table = 'comments';

  public function post()
  {
    return $this->belongsTo('Post');
  }

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function votes()
  {
    return $this->hasMany('CmtVote');
  }
}
