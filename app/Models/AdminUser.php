<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $guarded=['deleted_at'];

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
