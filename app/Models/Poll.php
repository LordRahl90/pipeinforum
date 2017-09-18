<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Poll extends Model
{
    use Sluggable;

    protected $guarded=['deleted_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * get all the available options for this poll
     */
    public function options(){
        return $this->hasMany('App\Models\PollOption','poll_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * Response to the poll
     */
    public function responses(){
        return $this->hasMany('App\Models\PollResponse','poll_id','id');
    }

    public function owner(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }


    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
