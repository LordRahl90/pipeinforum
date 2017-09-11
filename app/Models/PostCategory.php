<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PostCategory extends Model
{
    use Sluggable;

    protected $guarded=['deleted_at'];

    public function subCategories(){
        return $this->hasMany('App\Models\PostSubCategory','category_id','id');
    }

    public function posts(){
        return $this->hasManyThrough('App\Models\Post','App\Models\PostSubCategory','category_id','sub_category_id');
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'category'
            ]
        ];
    }
}
