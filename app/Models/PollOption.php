<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    protected $guarded=['deleted_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * return the poll
     */
    public function poll(){
        return $this->belongsTo('App\Models\Poll','poll_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * return array of responses
     */
    public function responses(){
        return $this->hasMany('App\Models\PollResponse','option_id','id');
    }
}
