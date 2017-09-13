<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 3:59 PM
 */

namespace App\Repositories\Models;


use App\Repositories\Eloquent\Repository;

class PostRepository extends Repository
{

    public function model()
    {
        return 'App\Models\Post';
    }


    public function activeThreads(){
        return $this->model->withCount('comment')->get();
    }

    public function likes($post_id){
        return $this->model->whereRaw("post_id=? and reaction=?",[$post_id,"like"]);
    }

    public function dislikes($post_id){
        return $this->model->whereRaw("post_id=? and reaction=?",[$post_id,"dislike"]);
    }
}