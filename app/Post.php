<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user()   //和user model做串聯，一篇文章對到一個user
    {
        return $this->belongsTo('App/User');  //post屬於user

    }
}
