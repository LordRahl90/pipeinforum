<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 12/09/2017
 * Time: 11:43 PM
 */

namespace App\Repositories\Models;


use App\Repositories\Eloquent\Repository;

class AdminUserRepository extends Repository
{

    public function model()
    {
        return 'App\Models\AdminUser';
    }
}