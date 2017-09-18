<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 18/09/2017
 * Time: 10:07 AM
 */

namespace App\Repositories\Models;


use App\Repositories\Eloquent\Repository;

class PollMessageRepository extends Repository
{

    public function model()
    {
        return 'App\Models\PollMessage';
    }

}