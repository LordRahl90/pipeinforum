<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded=['deleted_at'];

    function owner(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    function post(){
        return $this->belongsTo('App\Models\Post','post_id','id');
    }
}
