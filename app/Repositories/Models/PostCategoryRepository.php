<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 3:57 PM
 */

namespace App\Repositories\Models;


use App\Repositories\Eloquent\Repository;

class PostCategoryRepository extends Repository
{
    public function model()
    {
        return 'App\Models\PostCategory';
    }

    public function withRelationship($id){
        return $this->model->with('subCategories')->find($id);
    }
}