<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public function author(){
        return $this->belongsTo('App\User','user_id');
    }

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id');
    }

    public function image(){
        return $this->belongsTo('App\Image','thumbnail_id');
    }

    public function banner(){
        return $this->belongsTo('App\Image','banner_id');
    }
}
