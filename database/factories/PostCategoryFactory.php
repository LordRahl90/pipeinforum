<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 6:37 PM
 */

use Faker\Generator as Faker;

$factory->define(\App\Models\PostCategory::class, function(Faker $faker){
    $options=["Sport","Lifestyle","Politics","Entertainment"];
    return [
      'category'=>$faker->randomElement($options)
    ];
});