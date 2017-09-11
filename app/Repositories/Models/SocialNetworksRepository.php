<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 4:01 PM
 */

namespace App\Repositories\Models;


use App\Repositories\Eloquent\Repository;

class SocialNetworksRepository extends Repository
{
    public function model()
    {
        return 'App\Models\UserSocialNetwork';
    }
}