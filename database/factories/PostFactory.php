<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 6:30 PM
 */

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function(Faker $faker){
    return [
        'user_id'=>function(){
            return rand(1, count(\App\Models\User::all()));
        },
        'sub_category_id'=>function(){
            return rand(1,count(\App\Models\PostSubCategory::all()));
        },
        'title'=>$faker->word,
        'content'=>$faker->paragraph,
        'status'=>true
    ];
});

?>