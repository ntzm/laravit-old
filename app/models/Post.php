<?php

class Post extends Eloquent {

  protected $table = 'posts';

  protected $fillable = array('title', 'content');

}
