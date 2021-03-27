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

    public function tagsString()
    {
        $tagsName=[];
        foreach($this->tags as $key=> $tag){
            $tagsName[]=$tag->name;   //將資料庫已有的tag放到array裡
        }
        $tagsString=implode(',',$tagsName);  //將這些tag用逗號串連回字串，update時在表單顯示

        return $tagsString;  //傳到呼叫這個function的地方(posts\_form)

    }

    public function comments()  //一個post有多個comment
    {
        return $this->hasMany('App\Comment');
    }
}
