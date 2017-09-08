<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 8:23 PM
 */

use Faker\Generator as Faker;


$factory->define(\App\Models\PostImages::class, function(Faker $faker){
    $posts=\App\Models\Post::all();

    return [
        'post_id'=>rand(1,count($posts)),
        'filename'=>$faker->imageUrl()
    ];
});