<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id','name','comment'];

    public function post()  //一個comment只會對到一篇post
    {
        return $this->belongsTo('App\Post');
    }

    public function user()  //一個comment只會對到一個user
    {
        return $this->belongsTo('App\User');
    }
}
