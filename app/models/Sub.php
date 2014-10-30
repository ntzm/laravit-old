<?php

class Sub extends Eloquent {

  protected $table = 'subs';

  protected $fillable = array('name', 'owner_id');

}
