<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','category_id'];  //設定可寫入資料的欄位

    public function user()   //和user model做串聯，一篇文章對到一個user
    {
        return $this->belongsTo('App\User');  //post屬於user

    }

    public function category()  //一個post屬於一個category
    {
        return $this->belongsTo('App\Category');  //post屬於user
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
