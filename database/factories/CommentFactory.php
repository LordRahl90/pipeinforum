<?php

/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 7:34 PM
 */

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Log;

$factory->define(\App\Models\Comment::class, function (Faker $faker) {
    $posts = \App\Models\Post::all();
    $users = \App\Models\User::all();
    $post_id=rand(1, count($posts));
    return [
        'post_id' => $post_id,
        'user_id' => rand(1, count($users)),
        'quote_comment_id' => function() use ($post_id,$faker){
            $comments=\App\Models\Comment::where("post_id","=",$post_id)->get();
            if(count($comments)<=0){
                return null;
            }
            $postComments=$comments->toArray();
            $commentItem=$postComments[rand(0,count($postComments)-1)];

            return $commentItem['id'];
        },
        'comment' => $faker->paragraph,
        'show' => $faker->randomElement([true, false]),
        'notification'=>$faker->randomElement([true,false])
    ];

});


?>

