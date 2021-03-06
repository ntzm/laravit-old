<?php

class Sub extends Elegant {

    protected $table = 'subs';
    protected $fillable = ['name', 'owner_id'];

    protected $rules = [
        'name' => 'required|min:3|max:20|alpha_dash|unique:subs'
    ];

    /**
     * Relationships
     */

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
