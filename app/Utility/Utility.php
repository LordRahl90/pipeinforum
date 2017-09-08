<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 08/09/2017
 * Time: 5:29 PM
 */

namespace App\Utility;


class Utility
{

    public function __construct()
    {
    }


    /**
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($msg){
        return response()->json(["status"=>"success","message"=>$msg]);
    }

    /**
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public  static function error($msg){
        return response()->json(["status"=>"error","message"=>$msg]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function databaseError(){
        return response()->json(["status"=>"error","message"=>"An error occurred while connecting... Please try again"]);
    }
}