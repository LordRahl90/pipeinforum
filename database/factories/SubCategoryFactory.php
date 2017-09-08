<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 6:41 PM
 */

use Faker\Generator as Faker;

$factory->define(\App\Models\PostSubCategory::class, function(Faker $faker){
    $options=[
        'Premiership','General','Testing','Tested','La-Liga','Jobs','Seria-A'
    ];
    return [
        'category_id'=>function(){
            return rand(1,count(\App\Models\PostCategory::all()));
        },
        'sub_category'=>$faker->randomElement($options)
    ];
});