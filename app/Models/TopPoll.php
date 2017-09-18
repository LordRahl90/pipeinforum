<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopPoll extends Model
{
    protected $guarded=['deleted_at'];

    public function poll(){
        return $this->hasOne('App\Models\Poll','id','poll_id');
    }
}
