<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 4:00 PM
 */

namespace App\Repositories\Models;


use App\Repositories\Eloquent\Repository;

class PostReactionRepository extends Repository
{

    public function model()
    {
        return 'App\Models\PostReaction';
    }

}