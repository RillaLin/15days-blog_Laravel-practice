<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content'];  //設定可寫入資料的欄位

    public function user()   //和user model做串聯，一篇文章對到一個user
    {
        return $this->belongsTo('App\User');  //post屬於user

    }
}
