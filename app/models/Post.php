<?php

class Post extends Elegant {

    protected $table = 'posts';
    protected $fillable = ['title', 'url', 'sub_id', 'user_id'];

    protected $rules = [
        'title' => 'required|max:100',
        'url'   => 'required|max:2083|active_url',
        'sub'   => 'required|exists:subs,name'
    ];

    /**
     * Relationship
     */

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
