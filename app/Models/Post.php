<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Sluggable;

    protected $guarded=['deleted_at'];

    public function sub_category(){
        return $this->belongsTo('App\Models\PostSubCategory','sub_category_id','id');
    }

    public function owner(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment','post_id','id');
    }

    public function images(){
        return $this->hasMany('App\Models\PostImages','post_id','id');
    }

    public function reactions(){
        return $this->hasMany('App\Models\PostReaction','post_id','id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
