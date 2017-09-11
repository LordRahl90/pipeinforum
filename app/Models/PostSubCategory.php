<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PostSubCategory extends Model
{
    use Sluggable;

    protected $guarded=['deleted_at'];


    public function category(){
        return $this->belongsTo('App\Models\PostCategory','category_id','id');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post','sub_category_id','id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'sub_category'
            ]
        ];
    }
}
