<?php

class CmtVote extends Eloquent {

  protected $table   = 'cmtvotes';
  public $timestamps = false;

  public function user()
  {
    return $this->belongsTo('User');
  }

  public function comment()
  {
    return $this->belongsTo('Comment');
  }
}
