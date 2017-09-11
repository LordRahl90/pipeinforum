<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostSubCategory extends Model
{
    protected $guarded=['deleted_at'];

    public function posts(){
        return $this->hasMany('App\Models\Post','sub_category_id','id');
    }
}
