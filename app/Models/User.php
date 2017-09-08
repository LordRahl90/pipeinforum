<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model
{
    use EntrustUserTrait;

    protected $guarded=['deleted_on'];

    public function posts(){
        return $this->hasMany('App\Models\Post','user_id','id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment','user_id','id');
    }

    public function reactions(){
        return $this->hasMany('App\Models\PostReaction','user_id','id');
    }

    public function socialNetworks(){
        return $this->hasMany('App\Models\UserSocialNetwork','user_id','id');
    }
}
