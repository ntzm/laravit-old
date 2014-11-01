<?php

class Post extends Eloquent {

  protected $table    = 'posts';
  protected $fillable = array('title', 'url', 'sub_id', 'user_id');

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function sub()
  {
    return $this->belongsTo('Sub');
  }

  public function comments()
  {
    return $this->hasMany('Comment');
  }

  public function votes()
  {
    return $this->hasMany('PostVote');
  }
}
