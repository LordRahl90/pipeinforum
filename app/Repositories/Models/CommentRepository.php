<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 3:59 PM
 */

namespace App\Repositories\Models;


use App\Repositories\Eloquent\Repository;

class CommentRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Comment';
    }

}