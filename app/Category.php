<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts() //一個category有多篇posts
    {
        return $this->hasMany('App\Post');  //回傳一個關係
    }
}
