<?php

class Comment extends Eloquent {

    protected $table = 'comments';

    protected $rules = [
        'content' => 'required|max:3000'
    ];

    /**
     * Relationships
     */

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
