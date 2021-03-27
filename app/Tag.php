<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];  //可在controller用massassignment塞值
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
    
}
