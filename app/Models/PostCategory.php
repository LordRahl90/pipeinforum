<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $guarded=['deleted_at'];

    public function subCategories(){
        return $this->hasMany('App\Models\PostSubCategory','category_id','id');
    }
}
